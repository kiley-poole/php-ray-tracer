<?php

class Canvas
{
    public int $width;
    public int $height;
    public array $canvas;

    public function __construct(int $width = 0, int $height = 0)
    {
        $this->height = $height;
        $this->width = $width;
        $this->canvas = $this->buildCanvas();
    }

    public function writeColor(Color $color, int $row, int $col): void
    {
        $this->canvas[$row][$col] = $color;
    }

    public function canvasToPPM(): string
    {
        $ppm_string = "";
        $ppm_string .= "P3\n";
        $ppm_string .= "$this->width $this->height\n";
        $ppm_string .= "255\n";

        for($row = 0; $row < $this->height; $row++){
            $count = 0;
            for($col = 0; $col < $this->width; $col++){
                $color = $this->canvas[$row][$col];
                $normalized_color = $this->normalizeColor($color);
                foreach($normalized_color as $value){
                    if($count >= 65){
                        $ppm_string .= "\n";
                        $count = 0;
                    }
                    $ppm_string .= "$value ";
                    $count += strlen("$value ");
                }
            }
            $ppm_string .= "\n";
        }
        
        return $ppm_string;
    }

    private function buildCanvas(): array
    {
        $canvas = array_fill(0, $this->height, array_fill(0, $this->width, new Color(0,0,0)));
        return $canvas;
    }

    private function normalizeColor(Color $color): array
    {
        $colors = [$color->red, $color->green, $color->blue];
        
        foreach($colors as &$color_to_normalize ){
            if($color_to_normalize > 1){
                $color_to_normalize = 1;
            } elseif($color_to_normalize < 0) {
                $color_to_normalize = 0;
            }
            $color_to_normalize = (int)round($color_to_normalize * 255);
        }
        
        return $colors;

    }

}