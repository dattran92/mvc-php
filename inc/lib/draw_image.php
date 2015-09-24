<?php
class DrawImage
{
    var $background;
    
    function __construct($background_url) {
        $this->background = new Imagick($background_url);
    }

    function draw_it() {
        $draw = new ImagickDraw();
        $draw->setFillColor('#0d1eff');
        $draw->setFontSize(50);
        
        list($lines, $lineHeight) = wordWrapAnnotation($this->background, $draw, $msg, 140);
        for($i = 0; $i < count($lines); $i++) {
            $this->background->annotateImage($draw, $xpos, $ypos + $i*$lineHeight, 0, $lines[$i]);
        }
        return $background;
    }

    function wordWrapAnnotation($image, $draw, $text, $maxWidth)
    {
        $words = preg_split('%\s%', $text, -1, PREG_SPLIT_NO_EMPTY);
        $lines = array();
        $i = 0;
        $lineHeight = 0;
    
        while (count($words) > 0)
        {
            $metrics = $image->queryFontMetrics($draw, implode(' ', array_slice($words, 0, ++$i)));
            $lineHeight = max($metrics['textHeight'], $lineHeight);
    
            if ($metrics['textWidth'] > $maxWidth or count($words) < $i)
            {
                $lines[] = implode(' ', array_slice($words, 0, --$i));
                $words = array_slice($words, $i);
                $i = 0;
            }
        }
    
        return array($lines, $lineHeight);
    }
}
