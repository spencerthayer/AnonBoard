<?php
  define('ROOT',getcwd());
  include_once(ROOT."/inc/"."vars".".php");

  /* FUNCTIONS */

  function ago($timeAgo) {
     $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
     $lengths = array("60","60","24","7","4.35","12","10");
     $now = time();
         $difference = $now - $timeAgo;
         $tense = "ago";
     for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
         $difference /= $lengths[$j];
     }
     $difference = round($difference);
     if($difference != 1) {
         $periods[$j].= "s";
     }
     return "$difference $periods[$j] ago ";
  }

  function psl($x, $length) {
    if(strlen($x)<=$length) {
      echo $x;
    } else {
      $y=substr($x,0,$length) . " …";
      echo $y;
    }
  }

  /* /FUNCTIONS */

  class Forums {
  	protected $board;
  	protected $threads = array();
  	protected $updated = array();

  	function __construct($domainName=''){

  			$this->board = strtolower($domainName);
  			$this->loadThreads();
  	}

  	function loadThreads(){
      if(!is_dir(ROOT."/boards/")){
  			mkdir(ROOT."/boards/");
  		}
  		if(!is_dir(ROOT."/boards/{$this->board}/")){
  			mkdir(ROOT."/boards/{$this->board}/");
  			mkdir(ROOT."/boards/{$this->board}/images/");
  		}
  		foreach(glob(ROOT."/boards/{$this->board}/*.json") as $thread) {
  			$name = @str_replace('.json', '', end(explode('/', $thread)));
  			$data = @json_decode(file_get_contents($thread),true);
  			$this->threads[$name] = $data;
  			$this->updated[$data['updated']] = $name;
        $image = $data['image'];
  		}
  		krsort($this->updated);
      /* */
      global $maxPosts;
      $maxNum = ($maxPosts+1);
      if(!$maxPosts==0){
        $i = 0;
    		foreach($this->updated as $thread){
    			$i++;
    			if($i >= $maxNum && file_exists(ROOT."/boards/{$this->board}/{$thread}.json")){
    				unlink(ROOT."/boards/{$this->board}/{$thread}.json");
            unlink(ROOT."/boards/{$this->board}/images/".$thread['image']);
    			}
    		}
      }
      /* */
  	}

  	function imageUpload($vars){
  		if(isset($_FILES['image'])){
  			if ($_FILES['image']["error"] > 0) {
  				$error = $_FILES['image']["error"];
  				return '';
  			} else {
  				$hash = md5_file($_FILES['image']['tmp_name']);
  				$ext = end(explode('.', basename($_FILES['image']['name'])));
  				$size = filesize($_FILES['image']['tmp_name']);
  				$name = basename($_FILES['image']['name']);
          $imagePath = ROOT."/boards/{$this->board}/images/";
  				$image = "$hash.$ext";
  				if($ext=='jpg' || $ext=='png' || $ext=='jpeg' || $ext=='gif'){
  					move_uploaded_file($_FILES['image']['tmp_name'], $imagePath.$image);
  					return str_replace(ROOT, '', $image);
  				}else{
  					return '';
  				}
  			}
  		}else{
  			return '';
  		}
  	}

  	function newThread() {
  		$vars = $this->clean($_REQUEST);
  		if($vars['post']!=''){
  			$name = time();
  			while(file_exists(ROOT."/boards/{$this->board}/$name.json")){
  				$name++;
  			}
  			$post = array(
  				'created' => time(),
  				'updated' => time(),
  				'expires' => $vars['expires'],
          'topic' => $vars['topic'],
  				'post' => $vars['post'],
  				'anonym' => $vars['anonym'],
  				'password' => $vars['password'],
  				'code' => $vars['code'],
  				'image' => $this->imageUpload($vars),
          'replyID' => NULL,
  				'posts' => array()
  			);
  			file_put_contents(ROOT."/boards/{$this->board}/$name.json", json_encode($post));
  			$this->loadThreads();
  		}
  		$this->board();
  	}

    function updateThread($threadID){
  		$vars = $this->clean($_REQUEST);
  		if($vars['post']!=''){
  			$name = time();
  			$thread = $this->threads[$threadID];
  			$post = array(
  				'created' => time(),
  				'updated' => (time()+1),
  				'expires' => $vars['expires'],
          'topic' => $vars['topic'],
  				'post' => $vars['post'],
  				'anonym' => $vars['anonym'],
  				'password' => $vars['password'],
  				'code' => $vars['code'],
  				'image' => $this->imageUpload($vars),
          'replyID' => $threadID,
  				'posts' => array()
  			);
  			$thread['updated'] = time();
  			$thread['posts'][] = "$name";
  			file_put_contents(ROOT."/boards/{$this->board}/$name.json", json_encode($post));
  			file_put_contents(ROOT."/boards/{$this->board}/$threadID.json", json_encode($thread));
  			$this->loadThreads();
  		}
  		$this->viewThread($threadID);
  	}

    function delete($threadID) {
      $isThread = NULL;
      $thread = $this->threads[$threadID];
        include(ROOT."/inc/"."vars.php");
        include(ROOT."/inc/"."header.php");
        $delPassword = $thread['password'];
        if($delPassword == '') {
          $error_message = "<h1>Sorry post <a href='/".$threadID."'>#".$threadID."</a> cannot be deleted!</h1><h3>Author did not include a password.</h3>";
          echo $error_message;
          die;
        } if(isset($_POST['submit'])){
          $password = $_POST['password'];
          if($password == $delPassword){
            echo "<h1>DELETED POST <a href='/".$threadID."'>#".$threadID."</a>!</h1>";
      			$postPath = ROOT."/boards/{$this->board}/".$threadID.".json";
            $imgPath = ROOT."/boards/{$this->board}/images/".$thread['image'];
            if(!empty($postPath)){unlink($postPath);}
            if(!empty($thread['image'])){unlink($imgPath);}
            die;
          } else {
            $error_message = "<h1>Sorry you do not have access to delete post <a href='/".$threadID."'>#".$threadID."</a>!</h1>";
            echo $error_message;
          }
        }
        // if (empty($error_message)) { echo $error_message; }
        echo '<h3>Enter Password to Delete <a href="/'.$threadID.'"">#'.$threadID.'</a>!</h3>';
        echo '<form role="form" method="post" action="/delete/'.$threadID.'">';
        echo '<input type="text" name="password" class="form-control left" style="width:300px;margin-right:25px;" />';
        // echo '<input type="submit" name="submit" value="Delete" />';
        echo '<button type="submit" name="submit" class="btn btn-large red-bg" value="post">DELETE POST</button>';
        echo '</form>';
        include(ROOT."/inc/"."footer.php");
    }

    function smp() {
      $isThread = "false";
      include(ROOT."/inc/"."smp.php");
    }

    /** VIEWS CONSTRUCT **/
    function board() {
      $isThread = "false";
      include(ROOT."/inc/"."vars.php");
      include(ROOT."/inc/"."header.php");
      include(ROOT."/inc/"."home.php");
      include(ROOT."/inc/"."board.php");
      include(ROOT."/inc/"."form.php");
      include(ROOT."/inc/"."footer.php");
    }

    function viewThread($threadID){
      /** HANDLE 404 **/
      if(!file_exists(ROOT."/boards/{$this->board}/".$threadID.".json")) {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        include(ROOT."/inc/"."404.php");
        die();
      } else {
        $thread = $this->threads[$threadID];
      }
      $isThread = "true";
      include(ROOT."/inc/"."vars.php");
      include(ROOT."/inc/"."header.php");
      include(ROOT."/inc/"."post.php");
      include(ROOT."/inc/"."replies.php");
      include(ROOT."/inc/"."form.php");
      include(ROOT."/inc/"."footer.php");
    }

    # SEARCH JSON FILES
    //forums.phpfreaks.com/topic/270095-how-to-search-through-multiple-json-files

    /** FUNCTIONS **/
  	function clean($var){
  		if(is_array($var))
  			return $this->cleanArray($var);
  		else
  			return $this->cleanString($var);
  	}

  	function cleanArray($array){
  		if(!is_array($array))
  			return $array;
  		foreach($array as $key=>$value){
  			if(is_array($value))
  				$array[$key] = $this->cleanArray($value);
  			else
  				$array[$key] = $this->cleanString($value);
  		}
  		return $array;
  	}

  	function cleanString($string){
  		$string = strip_tags($string);
  		$string = str_replace("\n", '<br>', $string);
  		$string = preg_replace('/[[:^print:]]/', '', $string);
  		$string = trim($string);
  		return $string;
  	}
  }

  class Router {
  	protected $uri;
  	protected $method;
  	protected $match = false;

  	function __construct(){
  		$this->uri = @array_shift(explode("?", $_SERVER['REQUEST_URI']));
  		$this->method = strtolower($_SERVER['REQUEST_METHOD']);
  	}

  	public function __call($method, $arguments){
  		if(strtolower($method) != $this->method) return;

  		$match = preg_replace("/:([^\/.]*)/", "(.[^/]*)", $arguments[0]);
  		$match = str_replace("/", "\/", $match);
  		$total = preg_match("/^".$match."$/", $this->uri, $matches);

  		if($total==0) return;
  		if($this->match) return;

  		array_shift($matches);
  		$this->match = true;
  		call_user_func_array($arguments[1],$matches);
  	}

  	public function notFound($func){
  		if(!$this->match)
  			call_user_func_array($func,[]);
  	}
  }

  $forums = new Forums($domainName);
  $router = new Router();

  if($domainName!=''){
  	$router->post('/:threadID*/*/*', function($threadID) use ($forums){ $forums->updateThread($threadID); });
  	$router->get('/:threadID*/*/*', function($threadID) use ($forums){ $forums->viewThread($threadID); });
  	$router->post('/', function() use ($forums){ $forums->newThread(); });
  	$router->get('/', function() use ($forums){ $forums->board(); });
    $router->post('/delete/:threadID', function($threadID) use ($forums){ $forums->delete($threadID); });
    $router->get('/delete/:threadID', function($threadID) use ($forums){ $forums->delete($threadID); });
  	$router->post('/smp*', function() use ($forums){ $forums->smp(); });
  	$router->get('/smp*', function() use ($forums){ $forums->smp(); });
  }

  include_once(ROOT."/"."clear".".php");

?>
