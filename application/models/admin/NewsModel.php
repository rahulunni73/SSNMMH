<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author Rahul Narayanan Unni S
 */
class NewsModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    //create/add new doctor
    public function addNews($values,$result) {       

       $new_insert_data = array(
            'NEWS_TITLE' => $values['news_title'],
            'NEWS_CONTENT' => $values['editor1'],
            'DATE' => date('Y-m-d', strtotime(str_replace('-', '/', $values['date']))),
            'IMG_PATH' => $result['img_path'],
            'NEW_VENUE' => $values['news_venue'],
            'NEWS_TAG' => '',
            'POSTED_BY' => 'Admin'
        );
        $insert = $this->db->insert('News_Master', $new_insert_data);
        return $insert;
    }



    /*delete news*/
    public function removeNews($id) {
        $this->db->where('NEWS_ID', $id);
        $delete = $this->db->delete('News_Master');
        return $delete;
    }


    public function getNewsCount(){
        $query1 = $this->db->get('News_Master');
        $news_record_count = $query1->num_rows();
        return $news_record_count;
    }


    //get all department details used in department creation page
    public function getNews() {
        $this->db->select('NEWS_ID,NEWS_TITLE,NEWS_CONTENT,DATE,IMG_PATH,NEW_VENUE,NEWS_TAG,POSTED_BY');
        $this->db->from('News_Master');
        $query = $this->db->get();
        return $query->result();
    }


    public function getLatestNews() {
        $this->db->order_by("POSTED_DATE", "desc");
        $this->db->limit(4);
        $query = $this->db->get('News_Master');

        $news = array();
        foreach ($query->result() as $row)
        array_push($news, $row);

        return $news;
    }

}
?>