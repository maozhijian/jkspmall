<?php

/**
 * 楼层
 * @author maxmys
 * @date 2013-05-15
 * @return  array
 */
class FloorsWidget extends BaseWidget
{
    var $_name = 'floors';
    var $_ttl  = 86400;
    var $_num  = 13;

    /**
     * 渲染插件
     * @return array|null
     */
    function _get_data()
    {
        return $this->options;
    }//End Of Func _get_data();

    function parse_config($input)
    {
        $images = $this->_upload_image();
        if ($images)
        {
            foreach ($images as $key => $image)
            {
                $input['ad' . $key . '_image_url'] = $image;
            }//End Of Foreach
        }//End Of If
        return $input;
    }//End Of Func

    function _upload_image()
    {
        import('uploader.lib');
        $images = array();
        for ($i = 1; $i <= $this->_num; $i++)
        {
            $file = $_FILES['ad' . $i . '_image_file'];
            if ($file['error'] == UPLOAD_ERR_OK)
            {
                $uploader = new Uploader();
                $uploader->allowed_type(IMAGE_FILE_TYPE);
                $uploader->addFile($file);
                $uploader->root_dir(ROOT_PATH);
                $images[$i] = $uploader->save('data/files/mall/template', $uploader->random_filename());
            }//End Of If
        }//End Of For
        return $images;
    }//End Of Fun

}//End Of Class
?>