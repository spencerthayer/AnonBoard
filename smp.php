<?php
    $filePath = "https://theanarchistlibrary.org/library/vadim-v-damier-the-spanish-revolution-of-1936.muse";
    // GENERATE ENGLISH WORD CODE //
    // function _getWordCode() {
        $retval = '';
        $chosenwords = array();

        //Select a number of words from the following file
        //to create an invitation code
        // $file = $this->CONF['path'].'/utils/words.txt';
        $fp = fopen($filePath,'r');
        $fsize = filesize($filePath);

        for($x=0;$x<WORDCODE_NUMWORDS;$x++) {
            //Select random position in file and seek backwards until
            //a newline or beginning of file is hit. In either case, grab
            //the current line as the random word
            $pos = mt_rand(0,$fsize);
            fseek($fp,$pos);
            while(fgetc($fp) != "\n" && $pos != 0)
            { fseek($fp,--$pos); }
            $chosenwords[] = trim(fgets($fp));
        }

        return implode(WORDCODE_SEPERATOR,$chosenwords);
    // }
