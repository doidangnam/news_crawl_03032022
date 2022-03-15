<?php
class VnexpressPictureParser extends PictureParser implements IParse {
    protected $imgContainerRegex = '#<div class="fig-picture" .+?>(.*?)</div>#si';
    
    /**
     * Return an array of images for display
     *
     * @return array
     */
    public function getArrayElements()
    {
        return $this->parse();
    }
}