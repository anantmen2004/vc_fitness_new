<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->model('helper_model');
    }
	public function index()
	{
		$rec_count = $this->helper_model->get_cnt("oc_product");
		print_r($rec_count);exit;
		
         
         /* Get total number of records */
         // $sql = "SELECT count(product_id) FROM oc_product";
         // $retval = mysql_query( $sql, $conn );
         
         // if(! $retval ) {
         //    die('Could not get data: ' . mysql_error());
         // }
         // $row = mysql_fetch_array($retval, MYSQL_NUM );
         // $rec_count = $row[0];
         
         // if( isset($_GET{'page'} ) ) {
         //    $page = $_GET{'page'} + 1;
         //    $offset = $rec_limit * $page ;
         // }else {
         //    $page = 0;
         //    $offset = 0;
         // }
         
         // $left_rec = $rec_count - ($page * $rec_limit);
         // $sql = "SELECT emp_id, emp_name, emp_salary ". 
         //    "FROM employee ".
         //    "LIMIT $offset, $rec_limit";
            
         // $retval = mysql_query( $sql, $conn );
         
         // if(! $retval ) {
         //    die('Could not get data: ' . mysql_error());
         // }
         
         // while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
         //    echo "EMP ID :{$row['emp_id']}  <br> ".
         //       "EMP NAME : {$row['emp_name']} <br> ".
         //       EMP SALARY : {$row['emp_salary']} <br> ".
         //       "--------------------------------<br>";
         // }
         
         // if( $page > 0 ) {
         //    $last = $page - 2;
         //    echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
         //    echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         // }else if( $page == 0 ) {
         //    echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         // }else if( $left_rec < $rec_limit ) {
         //    $last = $page - 2;
         //    echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         // }
         
         // mysql_close($conn);
		$this->load->view('about');
	}
}