<?php
class DantriPictureParser extends PictureParser implements IParse {
    protected $imgContainerRegex = '#<figure class="image align-center" .+?>(.*?)</figure>#si';
    
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