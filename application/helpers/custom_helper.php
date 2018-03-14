<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('setUpImageUpload')){

function setUpImageUpload($width, $height, $folder_name = '',$org_img_file_name ='') {
        $config['upload_path'] = './assets1/images/' . $folder_name; //setting up image file location
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type of images can upload
        $config['max_size'] = '200';
        $config['max_width'] = $width;
        $config['max_height'] = $height;
        $ci =& get_instance();
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config); //update configure files with these settings
        $absolute_img_path = './assets1/images/'.$folder_name.'/'.$org_img_file_name;

        if (file_exists($absolute_img_path)) {        
            $result = array(
                'status' => true,'img_path' => $org_img_file_name ,'file_exists' => 'The file is already exists.'
            );
            return $result;
        } else {
            if (!$ci->upload->do_upload()) {
            $result = array('status' => false,
                'error' => $ci->upload->display_errors());
            return $result;
        } else {
            $data = $ci->upload->data();
            $result = array(
                'status' => true, 'img_path' => $org_img_file_name,'file_exists' => 'The file is uploaded.'
            );
            return $result;
        }
                }
    }
}





//my customized drop down for disabed option used in doctor update page
function my_form_dropdown($data = '', $options = array(), $selected = array(), $disabled = array(), $hidden= array(), $extra = '')
{
    $defaults = array();

    if (is_array($data))
    {
        if (isset($data['selected']))
        {
            $selected = $data['selected'];
            unset($data['selected']); // select tags don't have a selected attribute
        }

        if (isset($data['options']))
        {
            $options = $data['options'];
            unset($data['options']); // select tags don't use an options attribute
        }

        if (isset($data['disabled']))
        {
            $disabled = $data['disabled'];
            unset($data['disabled']); // select tags don't use an disabled attribute
        }

        if (isset($data['hidden']))
        {
            $hidden = $data['hidden'];
            unset($data['hidden']); // select tags don't use an hidden attribute
        }
    }
    else
    {
        $defaults = array('name' => $data);
    }

    is_array($selected) OR $selected = array($selected);
    is_array($options) OR $options = array($options);
    is_array($disabled) OR $disabled = array($disabled);
    is_array($hidden) OR $hidden = array($hidden);

    // If no selected state was submitted we will attempt to set it automatically
    if (empty($selected))
    {
        if (is_array($data))
        {
            if (isset($data['name'], $_POST[$data['name']]))
            {
                $selected = array($_POST[$data['name']]);
            }
        }
        elseif (isset($_POST[$data]))
        {
            $selected = array($_POST[$data]);
        }
    }

    $extra = _attributes_to_string($extra);

    $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

    $form = '<select '.rtrim(_parse_form_attributes($data, $defaults)).$extra.$multiple.">\n";

    foreach ($options as $key => $val)
    {
        $key = (string) $key;

        if (is_array($val))
        {
            if (empty($val))
            {
                continue;
            }

            $form .= '<optgroup label="'.$key."\">\n";

            foreach ($val as $optgroup_key => $optgroup_val)
            {
                $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';
                $dis = in_array($optgroup_key, $disabled) ? ' disabled' : '';
                $hid = in_array($optgroup_key, $hidden) ? ' hidden' : '';
                $form .= '<option value="'.html_escape($optgroup_key).'"'.$sel.$dis.$hid.'>'
                    .(string) $optgroup_val."</option>\n";
            }

            $form .= "</optgroup>\n";
        }
        else
        {
            $form .= '<option value="'.html_escape($key).'"'
                .(in_array($key, $selected) ? ' selected="selected"' : ''). (in_array($key, $disabled) ? ' disabled': ''). (in_array($key, $hidden) ? ' hidden': '').'>'
                .(string) $val."</option>\n";
        }
    }

    return $form."</select>\n";
} 







