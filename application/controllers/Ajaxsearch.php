<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('ajaxsearch');
 }

 function fetch()
 {
      $output = '';
      $query = '';
      $this->load->model('ajaxsearch_model');
      if($this->input->post('query'))
      {
       $query = $this->input->post('query');
      }
      $data = $this->ajaxsearch_model->fetch_data($query);
      $output .= '
      <div class="table-responsive">
         <table class="table table-bordered table-striped">
          <tr>
           <th>Title</th>           
          </tr>
      ';
      if($data->num_rows() > 0)
      {
       foreach($data->result() as $row)
       {
        $output .= '
          <tr>
           <td>'.$row->title_case.'</td>
           
          </tr>
        ';
       }
      }
      else
      {
       $output .= '<tr>
           <td colspan="5">No Data Found</td>
          </tr>';
      }
      $output .= '</table>';
      echo $output;
     }
 
}