<?php
/*
Plugin Name: CCMT FAQ
Plugin URI: http://google.co.in
Description: Plugin for adding Event .
Version: 1.0
Author: Girish Vas 
Author URI:
Updated By: Br Saket
Compatible upto WP version: 5.5.9
*/
    if(isset($_POST['faq-download'])) 
    {
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=Faq.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            ob_end_clean();
            echo "ID,Name,Phone,Email,Question";
            echo "\n";
            $results = $wpdb->get_results("SELECT * FROM wp_faq");
            foreach ($results as $value) 
            {
                    $fid = $value->faq_id;
                    $fname = str_replace(" ",".",$value->name);
                    $fphone = $value->phone;
                    $femail = $value->email;
                    $fquestion = str_replace(" ",".",$value->question);
                    $fquestion = str_replace("\n",".",$fquestion);
                    $fquestion = str_replace("^M","",$fquestion);
                    $fquestion = str_replace(":",".",$fquestion);
                    echo $fid.",".$fname.",".$fphone.",".$femail.",".$fquestion;
                    echo "\n";
            }
    exit();
    }
    if(isset($_POST['donation-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=Donation.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,Date&Time,First_Name,Last_Name,Email,Contact,Place,Address,City,State,Country,Order_ID,Project_Name,Amount,Total,Payement_Method,Status";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_donation as d,wp_donation_project as p WHERE d.id = p.order_id");
        foreach ($results as $value) 
        {
            $id = $value->id;
            $date = $value->date;
            $time = $value->time;
            $dtime = $date."-".$time;
            $fname = str_replace(" ",".",$value->first_name);
            $lname = str_replace(" ",".",$value->last_name);
            $email = $value->email;
            $contact = str_replace(" ",".",$value->contact);
            $place = str_replace(" ",".",$value->address1);
            $address = $value->address1;
            $city = str_replace(" ","_",$value->city);
            $state = str_replace(" ","_",$value->state);
            $country = str_replace(" ","_",$value->country);
            $order = $value->order_id;
            $project = str_replace(" ","_",$value->project_name);
            $amount = $value->amount;
            $total = $value->total_amount;
            $payement = str_replace(" ",".",$value->payment_method);
            $status = $value->status;
            echo $id.",".$dtime.",".$fname.",".$lname.",".$email.",".$contact.",".$place.",".$address.",".$city.",".$state.",".$country.",".$order.",".$project.",".$amount.",".$total.",".$payement.",".$status;
            echo "\n";
        }
    exit();
    }

    if(isset($_POST['balvihar-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=BalVihar_Donation.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,Date&Time,First_Name,Last_Name,Place,City,State,City,pincode,Email,Contact,Amount,Transaction ID,Status";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_balvihar_sub");
   
        foreach ($results as $value) 
        {
            $id = $value->id;
            $date = $value->date;
            $time = $value->time;
            $dtime = $date."-".$time;
            $fname = $value->sub_name;
            $lname = $value->prnt_name;
            $place1 = preg_replace("#\s+#"," ",$value->address);
            $place = str_replace(","," ",$place1);
            // preg_replace('#\s+#',',',trim($str));
            $city = $value->city;
            $state = $value->state;
            $country = $value->county;
            $pincode = $value->pincode;
            $email = $value->email;
            $contact = str_replace(" ",".",$value->contact_no);
            $amount = $value->amount;
            $transation_id = $value->transation_id;
            $status = $value->status;
            echo $id.",".$dtime.",".$fname.",".$lname.",".$place.",".$city.",".$state.",".$country.",".$pincode.",".$email.",".$contact.",".$amount.",".$transation_id.",".$status;
            echo "\n";
        }
        exit();
    }

    if(isset($_POST['donation-download-project'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=Donation.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,category_id,category_name,project_id,project_name,order_id,transaction_id,amount";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_donation_project order by  project_name");
        foreach ($results as $value) 
        {
            $pid = $value->id;
            $pcategory_id = $value->category_id;
            $pcategory_name = $value->category_name;
            $pproject_id = $value->project_id;
            $pproject_name = $value->project_name;
            $porder_id = $value->order_id;
            $ptransaction_id = $value->transaction_id;
            $pamount = $value->amount;
            echo $pid.",".$pcategory_id.",".$pcategory_name.",".$pproject_id.",".$pproject_name.",".$porder_id.",".$ptransaction_id.",".$pamount;
            echo "\n";
        }
        exit();
    }

    if(isset($_POST['feedback-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=Feedback.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "Helpful_Info,Easy_Locate_Info,Understandale,Navigation,Uptodate,Outdated_Event,Outdated_Itinerary,Outdated_Activity,Outdated_Courses,Outdated_News,Outdated_Centre,Outdated_Acharya,Outdated_projects,Connection_type,Loading_time,Country,Frequent_Visit,Liked_Features,Issue,Comment_on_Issue,Any_Feedback";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_feedback");
        foreach ($results as $value) 
        {
                $info = str_replace(" ",".",$value->provide_info);
                $infosite = str_replace(" ",".",$value->infoonsite);
                $understand = str_replace(" ",".",$value->link_understand);
                $nvigate = str_replace(" ",".",$value->site_navigation);
                $scontent = str_replace(" ",".",$value->site_content);
                $event = str_replace(" ",".",$value->events);
                $itinerary = str_replace(" ",".",$value->itinerary);
                $activity = str_replace(" ",".",$value->activity);
                $course = str_replace(" ",".",$value->course);
                $news = str_replace(" ",".",$value->news);
                $centre = str_replace(" ",".",$value->centre);
                $acharya = str_replace(" ",".",$value->acharya);
                $projects = str_replace(" ",".",$value->projects);
                $contype = str_replace(" ",".",$value->connection_type);
                $slspeed = str_replace(" ",".",$value->siteload_speed);
                $country = str_replace(" ",".",$value->country);
                $visit = str_replace(" ",".",$value->times_of_visit);
                $flike = str_replace(" ",".",$value-feature_like);
                $issue = str_replace(" ",".",$value->issue);
                $issue_comment = str_replace(" ",".",$value->issue_comment);
                $feedback = str_replace(" ",".",$value->any_feedback);
                echo $info.",".$infosite.",".$understand.",".$navigate.",".$scontent.",".$event.",".$itinerary.",".$activity.",".$course.",".$news.",".$centre.",".$acharya.",".$projects.",".$contype.",".$slspeed.",".$country.",".$visit.",".$flike.",".$issue.",".$issue_comment.",".$feedback;
                echo "\n";
        }
        exit();
    }
    if (isset($_POST["from"])) 
    {
        $from = $_POST["from"]; // sender
        $to = $_POST["to"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        // message lines should not exceed 70 characters (PHP rule), so wrap it
        $message = wordwrap($message, 70);
        // send mail
        mail($to,$subject,$message,"From: $from\n");
        //echo "Thank you for sending us feedback";
    }
    if(isset($_POST['user-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=User_info.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,User_ID,User_Name,First_Name,Middle_name,Last_Name,Gender,Dob,Address1,Address2,Pin,Phone,Mobile,Fax,Email,Subscription";
        echo "\n";
        $results = $wpdb->get_results("SELECT i.ID,i.userID,i.username,i.subscribe,u.user_email,m.meta_value as fname, um.meta_value as mname,un.meta_value as lname,g.meta_value as gender,h.meta_value as phone,o.meta_value as mobile,a.meta_value as address,b.meta_value as addres,p.meta_value as postal,d.meta_value as dob,f.meta_value as fax
                        FROM wp_userinfo as i
                        inner join wp_users as u
                        inner join wp_usermeta as m
                        inner join wp_usermeta as um
                        inner join wp_usermeta as un
                        inner join wp_usermeta as g
                        inner join wp_usermeta as h
                        inner join wp_usermeta as o
                        inner join wp_usermeta as a
                        inner join wp_usermeta as b
                        inner join wp_usermeta as p
                        inner join wp_usermeta as d
                        inner join wp_usermeta as f
                        where i.userID= u.ID 
                        and m.meta_key = 'first_name' and m.user_id = i.userID
                        and um.meta_key = 'middle_name' and um.user_id = i.userID
                        and un.meta_key = 'last_name' and un.user_id = i.userID
                        and g.meta_key = 'gender' and g.user_id = i.userID
                        and h.meta_key = 'phone' and h.user_id = i.userID
                        and o.meta_key = 'mobile' and o.user_id = i.userID
                        and a.meta_key = 'address' and a.user_id = i.userID
                        and b.meta_key = 'address1' and b.user_id = i.userID
                        and p.meta_key = 'postal' and p.user_id = i.userID
                        and d.meta_key = 'dd' and d.user_id = i.userID
                        and f.meta_key = 'fax' and f.user_id = i.userID
                ");
            foreach ($results as $value) 
            {
                $aid = $value->ID;
                $userid = $value->userID;
                $username = str_replace(" ",".",$value->username);
		        $fname =  str_replace(" ",".",$value->fname);
                $mname =  str_replace(" ",".",$value->mname);
	            $lname =  str_replace(" ",".",$value->lname);
		        $gender = $value->gender;
    		    $dob = $value->dob;
    		    $address = str_replace(" ",".",$value->address);
    		    $addres = str_replace(" ",".",$value->addres);
    		    $postal = $value->postal;
    		    $phone = $value->phone;
    		    $mobile = $value->mobile;
    		    $fax = $value->fax;
    		    $email = $value->user_email;
                $subscription = str_replace(" ",".",$value->subscribe);
		        $subscription = str_replace(",",".",$value->subscribe);
                echo $aid.",".$userid.",".$username.",".$fname.",".$mname.",".$lname.",".$gender.",".$dob.",".$address.",".$addres.",".$postal.",".$phone.",".$mobile.",".$fax.",".$email.",".$subscription;
                echo "\n";  
            }
        exit();
    }
    if(isset($_POST['contact-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=Contact_Us.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,Name,Phone,Email,Subject,Need_Help_on";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_contact_us_mail");
        foreach ($results as $value) 
        {
                $aid = $value->id;
                $name = $value->visit_name;
                $phone = $value->phone;
                $email = $value->email;
                $subject = str_replace(" ",".",$value->subject);
                $help = str_replace(" ",".",$value->help);
                echo $aid.",".$name.",".$phone.",".$email.",".$subject.",".$help;
                echo "\n";  
        }
        exit();
    }
    if(isset($_POST['career-download'])) 
    {
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=Career.csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        ob_end_clean();
        echo "ID,JobCode,Name,Email,Preference,Copied_Resume,Attachement_name";
        echo "\n";
        $results = $wpdb->get_results("SELECT * FROM wp_career");
        foreach ($results as $value) 
        {
                $id = $value->id;
                $Jobcode = $value->job_code;
                $name = str_replace(" ",".",$value->name);
                $email = $value->email;
                $resume = str_replace(" ",".",$value->resume);
                $resume = str_replace("^M","",$resume);
                $resume = str_replace("\n","_",$resume);
                $preference = str_replace(" ",".",$value->preferences);
                $attachement = $value->attachement;
                $order = explode('/',$attachement);
                $res = $order[5];
                $res = str_replace(" ","_",$res);
                echo $id. ",".$Jobcode.",".$name.",".$email.",".$preference.",".$resume.",".$res;
                echo "\n";
        }
        exit();
    }


add_action('admin_menu', 'faq_admin_menu');

function faq_admin_css() 
{
        wp_enqueue_style( 'prefix-style', plugins_url('location_admin.css', __FILE__) );
}
function faq_admin_menu() 
{
        add_menu_page ('CCMT','CCMT Downloads','administrator','ccmt-faq','display_ccmt_faq' , 'dashicons-editor-help');
        add_submenu_page('ccmt-faq','FAQ','FAQ','faq','faq','view_faq');
        add_submenu_page('ccmt-faq','Feedback','Feedback','feedback','feedback','view_feedback');
        add_submenu_page('ccmt-faq','User Info','User Info','userinfo','userinfo','view_userinfo');
        add_submenu_page('ccmt-faq','Contact Us','Contact Us','contactus','contactus','view_contactus');
        add_submenu_page('ccmt-faq','Career','Career','career','career','view_career');
	    add_submenu_page('ccmt-faq','Donation','Donation','donation','donation','view_donation');
        add_submenu_page('ccmt-faq','Donation By Cheque','Donation By Cheque','donation_by_cheque','donation_by_cheque','view_donation_by_cheque');
        add_submenu_page('ccmt-faq','Donation By Bank Transfer','Donation By Bank Transfer','donation_by_banktransfer','donation_by_banktransfer','view_donation_by_banktransfer');
        add_submenu_page('ccmt-faq','Donation Project','Donation Project','donation_project','donation_project','view_donation_project');

}
function display_ccmt_faq() { }

function view_faq() 
{
    ?>

<!-- stylesheet added here -->
<style>
    /* content_box DIV-Styles*/
    .plugin_box {
        display:none; /* Hide the DIV */
        position:fixed;
        _position:absolute; /* hack for internet explorer 6 */
        height:300px;
        width:600px;
        background:#FFFFFF;
        left: 385px;
        top: 100px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;
        line-height: 25px;
        /* additional features, can be omitted */
        border:2px solid #CCCCCC;
        padding:15px;
        /*font-size:15px; */
        -moz-box-shadow: 0 0 5px #CCCCCC;
        -webkit-box-shadow: 0 0 5px #CCCCCC;
        box-shadow: 0 0 5px #CCCCCC;
        }
    .plugin_box
    #container {
        background: #d2d2d2; /*Sample*/
        width:100%;
        height:100%;
    }
    a{
    cursor: pointer;
    text-decoration:none;
    }
    /* This is for the positioning of the Close Link */
    .pluginBoxClose {
        font-size:20px;
        line-height:15px;
        right:5px;
        top:5px;
        position:absolute;
        color:#6fa5e2;
        font-weight:500;
    }
</style>
<!-- stylesheet adding over-->

<?php
    //$con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    //if (mysqli_connect_errno())
    //{
     //   echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //}
    //else
    //{
    faq_load_css();
    echo "<form action='.' method='post'>";
            echo "<input class='itin' name='faq-download' type='submit' value='Download FAQ' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
    echo "</form>";
    echo "<h2>Frequently Asked Questions Form</h2>";
    $result = $wpdb->get_results("SELECT * FROM wp_faq");
    //$result = mysqli_query($con,"SELECT * FROM `wp_faq`");
    echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
    echo "<table class='loc-table' style='empty-cells:show;'>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Phone</th>";
    echo "<th>Email</th>";
    echo "<th>Question</th>";
    echo "<th></th>";
    // while($row = mysqli_fetch_array($result))
    while($row = $result)
    {
        $aid = $row['faq_id'];
        $aname = $row['name'];
        $aphone = $row['phone'];
        $aemail = $row['email'];
        $aquestion = $row['question'];
        echo "<tr id=$aid>";
        echo "<form action='' method='post'>";
        echo "<td>" . $aid. "</td>";
        echo "<td>" . $aname. "</td>";
        echo "<td>" . $aphone. "</td>";
        echo "<td><input type='hidden' name='email' value=$aemail>" . $aemail. "</td>";
        echo "<td>" . $aquestion. "</td>";
        echo "<td><input type='button' name='reply' id='$aid' class='reply_faq' value='Reply'></td>";
        echo "<div class='plugin_box plugin_box-$aid'>    <!-- OUR content_box  DIV-->";
        echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
        echo "<a class='pluginBoxClose'>Close</a>";
        echo "<div class='projectcontent'>";
        echo "<div class='select-style'>
                <form method='post' action='.'>
                From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$aemail' name='to' readonly><br/>
                Subject:&nbsp;&nbsp;<input type='text' name='subject' value='test' readonly><br/>
                <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                </form>
                </div>";
        echo "</div>";
        echo "</div><!-- content_box -->";
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    faq_load_js();
    //}
}//function view_faq ends


function view_feedback() 
{
   // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
 //   if (mysqli_connect_errno())
    //{
  //      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   // }
   // else
   // {

        faq_load_css();
        echo "<form action='.' method='post'>";
            echo "<input class='itin' name='feedback-download' type='submit' value='Download Feedback' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>Feedback Form</h2>";
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM wp_feedback");
        //$result = mysqli_query($con,"SELECT * FROM `wp_feedback`");
        echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
        echo "<table class='loc-table'style='empty-cells:show;'>";
        echo "<th>ID</th>";
        echo "<th>Helpful Info</th>";
        echo "<th>Easy Locate Info</th>";
        echo "<th>Understandable</th>";
        echo "<th>Navigation</th>";
        echo "<th>Up to Date</th>";
        echo "<th>Event</th>";
        echo "<th>Itinerary</th>";
        echo "<th>Activity</th>";
        echo "<th>Courses</th>";
        echo "<th>News</th>";
        echo "<th>Centre</th>";
        echo "<th>Acharya</th>";
        echo "<th>Projects</th>";
        echo "<th>Connection Type</th>";
        echo "<th>Loading time</th>";
        echo "<th>Country</th>";
        echo "<th>Frequently visit</th>";
        echo "<th>Feature Like</th>";
        echo "<th>Issue</th>";
        echo "<th>Issue Comment</th>";
        echo "<th>Any Feedback</th>";
        echo "<th></th>";
        // while($row = mysqli_fetch_array($result))
        while($row = $result)
        {
            $aid = $row['id'];
            $pinfo = $row['provide_info'];
            $siteinfo = $row['infoonsite'];
            $link = $row['link_understand'];
            $navigation = $row['site_navigation'];
            $content = $row['site_content'];
            $events = $row['events'];
            $itinerary = $row['itinerary'];
            $activity = $row['activity'];
            $course = $row['course'];
            $news = $row['news'];
            $centre = $row['centre'];
            $acharya = $row['acharya'];
            $projects = $row['projects'];
            $connection = $row['connection_type'];
            $speed = $row['siteload_speed'];
            $country = $row['country'];
            $visit = $row['times_of_visit'];
            $feature = $row['feature_like'];
            $issue = $row['issue'];
            $icomment = $row['issue_comment'];
            $feedbacks = $row['any_feedback'];
            echo "<tr value=$aid>";
            echo "<td>" . $aid. "</td>";
            echo "<td>" . $pinfo. "</td>";
            echo "<td>" . $siteinfo. "</td>";
            echo "<td>" . $link. "</td>";
            echo "<td>" . $navigation. "</td>";
            echo "<td>" . $content. "</td>";
            echo "<td>" . $events. "</td>";
            echo "<td>" . $itinerary. "</td>";
            echo "<td>" . $activity. "</td>";
            echo "<td>" . $course. "</td>";
            echo "<td>" . $news. "</td>";
            echo "<td>" . $centre. "</td>";
            echo "<td>" . $acharya. "</td>";
            echo "<td>" . $projects . "</td>";
            echo "<td>" . $connection. "</td>";
            echo "<td>" . $speed. "</td>";
            echo "<td>" . $country. "</td>";
            echo "<td>" . $visit. "</td>";
            echo "<td>" . $feature. "</td>";
            echo "<td>" . $issue. "</td>";
            echo "<td>" . $icomment. "</td>";
            echo "<td>" . $feedbacks. "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        faq_load_js();
    //}
}//function view feedback ends

function view_donation_project() 
{
    //$con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
        faq_load_css();
        echo "<form action='.' method='post'>";
        echo "<input class='itin' name='donation-download-project' type='submit' value='Download Donation Project' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>Donation Project Form</h2>";
        global $wpdb;   
        $searchform .="";
        $searchform .="<div>";
        $searchform .="<form action='' method='get'>";
        $searchform .= "<select name ='project-name'>";
        foreach($wpdb->get_results("SELECT DISTINCT project_name FROM `wp_donation_project`") as $key => $page)
        {
            $searchform .= "<option value='".$page->project_name."'>".$page->project_name."</option>";
        }
        $searchform .="</select>";
        $searchform .="<input type='hidden' value='donation_project' name='page' id='search'/>";
        $searchform .= "<input type='submit' value='search' name='search-admin'/>";
        $searchform .="</form>";
        $searchform .= "</div>";
        echo $searchform;
        if ($_GET['search-admin']) 
        {
            $word = $_GET['project-name'];
            echo $word;
            $result = $wpdb->get_results("SELECT * FROM wp_donation_project WHERE project_name = '$word'");
            // $result = mysqli_query($con,"SELECT * FROM `wp_donation_project` WHERE project_name = '$word'");      
        }
        else
        {
            $result = $wpdb->get_results("SELECT * FROM wp_donation_project");      
            //$result = mysqli_query($con,"SELECT * FROM `wp_donation_project`");      
        }
        echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
        echo "<table class='loc-table'style='empty-cells:show;'>";
        echo "<th>ID</th>";
        echo "<th>Category ID</th>";
        echo "<th>Category Name</th>";
        echo "<th>Project Id</th>";
        echo "<th>Project Name</th>";
        echo "<th>Order Id</th>";
        echo "<th>Transaction Id</th>";
        echo "<th>Amount</th>";
        // while($row = mysqli_fetch_array($result)) 
        while($row = $result)
        {
            $id = $row['id'];
            $pcategory_id = $row['category_id'];
            $pcategory_name = $row['category_name'];
            $pproject_id = $row['project_id'];
            $pproject_name = $row['project_name'];
            $porder_id = $row['order_id'];
            $ptransaction_id = $row['transaction_id'];
            $pamount = $row['amount'];    
            echo "<tr value='$id'>";
            echo "<td>" . $id. "</td>";
            echo "<td>" . $pcategory_id. "</td>";
            echo "<td>" . $pcategory_name. "</td>";
            echo "<td>" . $pproject_id. "</td>";
            echo "<td>" . $pproject_name. "</td>";
            echo "<td>" . $porder_id. "</td>";
            echo "<td>" . $ptransaction_id. "</td>";
            echo "<td>" . $pamount. "</td>";
                // echo "<td><input type='button' name='reply' id='$id' class='reply_contact' value='Reply'></td>";
                    // echo "<div class='plugin_box plugin_box-$id'>    <!-- OUR content_box  DIV-->";
                    // echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
                    // echo "<a class='pluginBoxClose'>Close</a>";
                    // echo "<div class='projectcontent'>";
                    // echo    "<div class='select-style'>
                    //         <form method='post' action='.'>
                    //         From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                    //         To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to' readonly><br/>
                    //         Subject:&nbsp;&nbsp;<input type='text' name='subject' value='Thanks for contacing us' readonly><br/>
                    //         <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                    //         <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                    //         </form>
                    //         </div>";
                    // echo "</div>";
                    // echo "</div><!-- content_box -->";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        faq_load_js();
    //} 
}//function view donation project ends
function view_userinfo() 
{
    //$con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
        faq_load_css();
        echo "<form action='.' method='post'>";
                echo "<input class='itin' name='user-download' type='submit' value='Download User Information' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>User Information Form</h2>";
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM wp_userinfo as i
                                        inner join wp_users as u 
                                        inner join wp_usermeta as m
                                        where i.userID= u.ID 
                                        and m.meta_key = 'first_name' 
                                        and m.user_id = i.userID
                                    ");
        // $result = mysqli_query(
        //             $con,
        //                 "SELECT * FROM wp_userinfo as i
        //                 inner join wp_users as u 
        //                 inner join wp_usermeta as m
    	   //              where i.userID= u.ID 
        //                 and m.meta_key = 'first_name' 
        //                 and m.user_id = i.userID  
        //             ");
        echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
		
		$results = $wpdb->get_results(
                                     "SELECT i.ID,i.userID,i.username,i.subscribe,u.user_email,m.meta_value as fname, um.meta_value as mname,un.meta_value as lname,g.meta_value as gender,h.meta_value as phone,o.meta_value as mobile,a.meta_value as address,b.meta_value as addres,p.meta_value as postal,d.meta_value as dob,f.meta_value as fax
                            			FROM wp_userinfo as i
                            			inner join wp_users as u
                            			inner join wp_usermeta as m
                            			inner join wp_usermeta as um
                            			inner join wp_usermeta as un
                            			inner join wp_usermeta as g
                            			inner join wp_usermeta as h
                            			inner join wp_usermeta as o
                            			inner join wp_usermeta as a
                            			inner join wp_usermeta as b
                            			inner join wp_usermeta as p
                            			inner join wp_usermeta as d
                            			inner join wp_usermeta as f
                            			where i.userID= u.ID and m.meta_key = 'first_name' and m.user_id = i.userID
                            			and um.meta_key = 'middle_name' and um.user_id = i.userID
                            			and un.meta_key = 'last_name' and un.user_id = i.userID
                            			and g.meta_key = 'gender' and g.user_id = i.userID
                            			and h.meta_key = 'phone' and h.user_id = i.userID
                            			and o.meta_key = 'mobile' and o.user_id = i.userID
                            			and a.meta_key = 'address' and a.user_id = i.userID
                            			and b.meta_key = 'address1' and b.user_id = i.userID
                            			and p.meta_key = 'postal' and p.user_id = i.userID
                            			and d.meta_key = 'dd' and d.user_id = i.userID
                            			and f.meta_key = 'fax' and f.user_id = i.userID
		                              ");
        echo "<table class='loc-table'style='empty-cells:show;'>";
        echo "<th>ID</th>";
        echo "<th>User ID</th>";
        echo "<th>User Name</th>";
        echo "<th>First Name</th>";
        echo "<th>Middle Name</th>";
        echo "<th>Last Name</th>";
		echo "<th>Gender</th>";
        echo "<th>Dob</th>";
		echo "<th>Address</th>";
		echo "<th>Phone</th>";
        echo "<th>Mobile</th>";
        echo "<th>Fax</th>";
		echo "<th>Email</th>";
        echo "<th>Subscription</th>";
		foreach ($results as $value) 
        {
            $aid = $value->ID;
            $userid = $value->userID;
			$username = $value->username;
			$subscribe = $value->subscribe;
			$email = $value->user_email;
			$fname = $value->fname;
            $mname = $value->mname;
            $lname = $value->lname;
    	    $gender = $value->gender;
			$phone = $value->phone;
            $mobile = $value->mobile;
			$address = $value->address;
			$addres = $value->addres;
            $postal = $value->postal;
            $dob = $value->dob;
            $fax = $value->fax;
			echo "<tr value=$aid>";
            echo "<td>" . $aid. "</td>";
            echo "<td>" . $userid. "</td>";
            echo "<td>" . $username. "</td>";
			echo "<td>" . $fname. "</td>";
			echo "<td>" . $mname. "</td>";
            echo "<td>" . $lname. "</td>";
            echo "<td>" . $gender. "</td>";
            echo "<td>" . $dob. "</td>";
			echo "<td>" . $address."<br/>". $addres . "<br/>". $postal."</td>";
			echo "<td>" . $phone. "</td>";
            echo "<td>" . $mobile. "</td>";
            echo "<td>" . $fax. "</td>";
            echo "<td>" . $email. "</td>";
            echo "<td>" . $subscribe. "</td>";
            echo "</tr>";
		}	
		echo "</table>";
        echo "</div>";
        faq_load_js();
    // }
}
function view_contactus() 
{
    global $wpdb;    
    if($_GET['delete-contactus']) 
    {
        $cd = $_GET['delete-contactus'];
        $wpdb->query(
        $wpdb->prepare(
                    "
                       DELETE FROM wp_contact_us_mail
                       WHERE id = %d
                    ",
                $cd
                )
        );
        echo "Record Deleted for ID ".$cd;
    }

    // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
        faq_load_css();
        echo "<form action='.' method='post'>";
                echo "<input class='itin' name='contact-download' type='submit' value='Download Contact Us' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>Contact Us Form</h2>";
        $result = $wpdb->get_results("SELECT * FROM wp_contact_us_mail");
        // $result = mysqli_query($con,"SELECT * FROM `wp_contact_us_mail`");
        echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
        echo "<table class='loc-table'style='empty-cells:show;'>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Phone</th>";
        echo "<th>Email</th>";
        echo "<th>To</th>";
        echo "<th>Subject</th>";
        echo "<th>Need Help on</th>";
        echo "<th></th>";
        // while($row = mysqli_fetch_array($result))
        while($row = $result)
        {
            $id = $row['id'];
            $name = $row['visit_name'];
            $phone = $row['phone'];
            $email = $row['email'];
            $to_email = $row['to_email'];
            $subject = $row['subject'];
            $help = $row['help'];
            echo "<tr id='$id'>";
            echo "<form action='' method='post'>";
            echo "<td>".$id."</td>";
            echo "<td>".$name."</td>";
            echo "<td>".$phone."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$to_email."</td>";
            echo "<td>".$subject."</td>";
            echo "<td>".$help."</td>";
            echo "<td><input type='button' name='reply' id='$id' class='reply_contact' value='Reply'></td>";
            echo "<td><a href='/wp-admin/admin.php?page=contactus&delete-contactus=".$id."'>Delete</a></td>";
            echo "<div class='plugin_box plugin_box-$id'>    <!-- OUR content_box  DIV-->";
            echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
            echo "<a class='pluginBoxClose'>Close</a>";
            echo "<div class='projectcontent'>";
            echo    "<div class='select-style'>
                    <form method='post' action='.'>
                    From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                    To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to'><br/>
                    Subject:&nbsp;&nbsp;<input type='text' name='subject' value='Thanks for contacing us'><br/>
                    <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' style='width: 545px;'>$help</textarea></p>
                    <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                    </form>
                    </div>";
            echo "</div>";
            echo "</div><!-- content_box -->";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        faq_load_js();
    // } 
}//function view contact us ends

function view_donation() 
{
    // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
        faq_load_css();
        echo "<form action='.' method='post'>";
        echo "<input class='itin' name='donation-download' type='submit' value='Download Donation' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<form action='.' method='post'>";
        echo "<input class='itin' name='balvihar-download' type='submit' value='Download Balvihar Subscription' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>Donation By Credit Card</h2>";
        
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM wp_donation WHERE payment_method = 'Credit Card'");
        //$result = mysqli_query($con,"SELECT * FROM `wp_donation` WHERE `payment_method` = 'Credit Card'");
        echo "<div style='width:1209px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
        echo "<table class='loc-table'style='empty-cells:show;'>";
        echo "<th>ID</th>";
        echo "<th>Date & Time</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Pancard No.</th>";
        echo "<th>Contact</th>";
        echo "<th>Address</th>";
        echo "<th>Total Amount</th>";
        echo "<th>Payement Method</th>";
        echo "<th>Status</th>";
        echo "<th>Transaction Id</th>";
        echo "<th>Receipt No.</th>";
        echo "<th>Bank AUthorisation Id</th>";
        echo "<th>Batch No.</th>";
        
        // while($row = mysqli_fetch_array($result)) 
        while($row =$result)
        {
            $id = $row['id'];
            $date = $row['date'];
            $time = $row['time'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $email = $row['email'];
            $pan_num = $row['pan_num'];
            $contact = $row['contact'];
            $place = $row['address1'];
            $address = $row['address2'];
            $city = $row['city'];
            $state = $row['state'];
            $country = $row['country'];
            $total_amount = $row['total_amount'];
            // $order = $row['order_id'];
            $payment_method = $row['payment_method'];
            // $bank = $row['bank'];
            // $account_no = $row['account_no'];
            // $cheque_number = $row['cheque_number'];
            // $name_on_cheque = $row['name_on_cheque'];
            // $name_of_donor = $row['name_of_donor'];
            // $originating_account = $row['originating_account'];
            $status = $row['status'];
            $transaction_id = $row['transaction_id'];
            $receipt_no = $row['receipt_no'];
            $bank_authorization_id = $row['bank_authorization_id'];
            $batch_no = $row['batch_no'];
            // $project = $row['project_name'];
            // $order = $row['order_id'];
            // $amount = $row['amount'];
            echo "<tr value='$id'>";
            echo "<td>" . $id. "</td>";
            echo "<td>" . $date."-".$time. "</td>";
            echo "<td>" . $fname." ". $lname."</td>";
            echo "<td>" . $email. "</td>";
            echo "<td>" . $pan_num. "</td>";
            echo "<td>" . $contact. "</td>";
            echo "<td>" . $place.",".$address.",".$city.",".$state.",".$country."</td>";
            echo "<td>" . $total_amount. "</td>";
            echo "<td>" . $payment_method. "</td>";
            echo "<td>" . $status. "</td>";
            echo "<td>" . $transaction_id. "</td>";
            echo "<td>" . $receipt_no. "</td>";
            echo "<td>" . $bank_authorization_id. "</td>";
            echo "<td>" . $batch_no. "</td>";
            echo "<td><input type='button' name='reply' id='$id' class='reply_contact' value='Reply'></td>";
            echo "<td><input type='button' name='detail' id='$id' class='detail_contact' value='Detail'></td>";
            echo "<div class='plugin_box plugin_box-$id'>    <!-- OUR content_box  DIV-->";
            echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
            echo "<a class='pluginBoxClose'>Close</a>";
            echo "<div class='projectcontent'>";
            echo    "<div class='select-style'>
                    <form method='post' action='.'>
                    From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                    To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to' readonly><br/>
                    Subject:&nbsp;&nbsp;<input type='text' name='subject'><br/>
                    <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                    <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                    </form>
                    </div>";
            echo "</div>";
            echo "</div><!-- content_box -->";
            echo "<div class='detail_box detail_box-$id'>    <!-- OUR content_box  DIV-->";
            echo "<h2 style='font-weight:bold;text-align:center;font-size:30px;'>Donation Detail #".$id."</h2>";
            echo "<a class='detailBoxClose'>Close</a>";
            echo "<div class='projectcontent'>";
            echo "Name:".$fname." ".$lname."</br>";
            echo "Transaction Id:".$transaction_id."</br>";

            $detailresult = $wpdb->get_results("SELECT * FROM wp_donation_project WHERE transaction_id = '$transaction_id'");
            //$detailresult = mysqli_query($con,"SELECT * FROM `wp_donation_project` WHERE transaction_id = '$transaction_id'");
                    
            while($detailrow = mysqli_fetch_array($detailresult)) 
            {
                $id = $detailrow['id'];
                // $pcategory_id = $row['category_id'];
                $pcategory_name = $detailrow['category_name'];
                // $pproject_id = $row['project_id'];
                $pproject_name = $detailrow['project_name'];
                $porder_id = $detailrow['order_id'];
                $ptransaction_id = $detailrow['transaction_id'];
                $pamount = $detailrow['amount'];                                       
                echo $id." ".$pcategory_name." ".$pproject_name." ".$porder_id." ".$ptransaction_id." ".$pamount."</br>";
            }
            echo "</div>";
            echo "</div><!-- content_box -->";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        faq_load_js();
    // } 
}

function view_donation_by_cheque() 
{
    global $wpdb;    
    // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {    
        faq_load_css();
        if ($_GET['update']) 
            {            
                if($_POST['update-status']) 
                {
                    $uid = $_GET['update'];
                    $u_c_status = $_POST['udonation-status'];                
                    global $wpdb;    
                    $wpdb->update(
                    'wp_donation',
                    array(
                    'status' => $u_c_status,   
                    ),
                    array( 'id' => $uid ),
                    array(
                    '%s',
                    '%s',
                    ),
                    array( '%d' )
                    );
                }
                $wid = $_GET['update'];
                echo "<h2>Update Status</h2>";
                $ws = $wpdb->get_results("SELECT * FROM wp_donation WHERE id = $wid AND payment_method LIKE 'cheque'");
                $ustatus ='';
                $ustatus .="<form method='post' action=''>";
                $ustatus .= "<div class='l-left'>Transaction ID:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->transaction_id;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Bank:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->bank;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Account No:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->account_no;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Cheque No.:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->cheque_number;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Name On Cheque:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->name_on_cheque;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Status Now:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= $ws[0]->status;
                $ustatus .= "</div></br>";
                $ustatus .= "<div class='l-left'>Update Status:</div>";
                $ustatus .= "<div class='l-right'>";
                $ustatus .= "<select name = 'udonation-status'>";
                $ustatus .= "<option value=''>Select Status Here</option>";
                $ustatus .= "<option value='pending'>Pending</option>";
                $ustatus .= "<option value='processing'>Processing</option>";
                $ustatus .= "<option value='successful'>Successful</option>";
                $ustatus .= "</select>";
                $ustatus .= "</div></br>";
                $ustatus .="<input type='hidden' name='update-status' id='update-status' value='status' />";
                $ustatus .="<input type='submit' value='Update Status' />";
                $ustatus .="</form>";
                echo "<div id='u-school' style='width:800px;'>".$ustatus."</div>";      
            }

            echo "<form action='.' method='post'>";
            echo "<input class='itin' name='donation-download' type='submit' value='Download Donation' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
            echo "</form>";
            echo "<h2>Donation By Cheque</h2>";
            $result = $wpdb->get_results("SELECT * FROM wp_donation WHERE payment_method = 'cheque'");
            // $result = mysqli_query($con,"SELECT * FROM `wp_donation` WHERE `payment_method` = 'cheque'");
            echo "<div style='width:1320px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
            echo "<table class='loc-table'style='empty-cells:show;'>";
            echo "<col width=''>";
            echo "<col width=''>";
            echo "<col width='100'>";
            echo "<th>ID</th>";
            echo "<th>Date & Time</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Pancard No.</th>";
            echo "<th>Contact</th>";
            echo "<th>Address</th>";
            echo "<th>Total Amount</th>";
            echo "<th>Payement Method</th>";
            echo "<th>Bank</th>";
            echo "<th>Account No.</th>";
            echo "<th>Cheque No.</th>";
            echo "<th>Name On Cheque</th>";
            echo "<th>Status</th>";
            echo "<th>Transaction Id</th>";
            // while($row = mysqli_fetch_array($result)) 
            while($row = $result) 
            {
                $id = $row['id'];
                $date = $row['date'];
                $time = $row['time'];
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $email = $row['email'];
                $pan_num = $row['pan_num'];
                $contact = $row['contact'];
                $place = $row['address1'];
                $address = $row['address2'];
                $city = $row['city'];
                $state = $row['state'];
                $country = $row['country'];
                $total_amount = $row['total_amount'];
                // $order = $row['order_id'];
                $payment_method = $row['payment_method'];
                $bank = $row['bank'];
                $account_no = $row['account_no'];
                $cheque_number = $row['cheque_number'];
                $name_on_cheque = $row['name_on_cheque'];
                $status = $row['status'];
                $transaction_id = $row['transaction_id'];
                echo "<tr value='$id'>";
                echo "<td>" . $id. "</td>";
                echo "<td>" . $date."-".$time. "</td>";
                echo "<td>" . $fname." ".$lname."</td>";
                echo "<td>" . $email. "</td>";
                echo "<td>" . $pan_num. "</td>";
                echo "<td>" . $contact. "</td>";
                echo "<td>" . $place.",".$address.",".$city.",".$state.",".$country."</td>";
                echo "<td>" . $total_amount. "</td>";
                echo "<td>" . $payment_method. "</td>";
                echo "<td>" . $bank. "</td>";
                echo "<td>" . $account_no. "</td>";
                echo "<td>" . $cheque_number. "</td>";
                echo "<td>" . $name_on_cheque. "</td>";
                echo "<td>" . $status. "</td>";
                echo "<td>" . $transaction_id. "</td>";
                echo "<td><a href='/wp-admin/admin.php?page=donation_by_cheque&update=".$id."'>Edit</a></td>";
                echo "<td><input type='button' name='reply' id='$id' class='reply_contact' value='Reply'></td>";
                echo "<td><input type='button' name='detail' id='$id' class='detail_contact' value='Detail'></td>";
                echo "<div class='plugin_box plugin_box-$id'>    <!-- OUR content_box  DIV-->";
                echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
                echo "<a class='pluginBoxClose'>Close</a>";
                echo "<div class='projectcontent'>";
                echo    "<div class='select-style'>
                        <form method='post' action='.'>
                        From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                        To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to' readonly><br/>
                        Subject:&nbsp;&nbsp;<input type='text' name='subject'><br/>
                        <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                        <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                        </form>
                        </div>";
                echo "</div>";
                echo "</div><!-- content_box -->";
                echo "<div class='detail_box detail_box-$id'>    <!-- OUR content_box  DIV-->";
                echo "<h2 style='font-weight:bold;text-align:center;font-size:30px;'>Donation Detail #".$id."</h2>";
                echo "<a class='detailBoxClose'>Close</a>";
                echo "<div class='projectcontent'>";
                echo "Name:".$fname." ".$lname."</br>";
                echo "Transaction Id:".$transaction_id."</br>";
                $detailresult = $wpdb->get_results("SELECT * FROM wp_donation_project WHERE transaction_id = '$transaction_id'");
                // $detailresult = mysqli_query($con,"SELECT * FROM `wp_donation_project` WHERE transaction_id = '$transaction_id'");
                        
                // while($detailrow = mysqli_fetch_array($detailresult)) 
                while($detailrow = $detailresult) 
                {
                    $id = $detailrow['id'];
                    $pcategory_name = $detailrow['category_name'];
                    $pproject_name = $detailrow['project_name'];
                    $porder_id = $detailrow['order_id'];
                    $ptransaction_id = $detailrow['transaction_id'];
                    $pamount = $detailrow['amount'];
                    echo $id." ".$pcategory_name." ".$pproject_name." ".$porder_id." ".$ptransaction_id." ".$pamount."</br>";
                }
                echo "</div>";
                echo "</div><!-- content_box -->";
                echo "</form>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            faq_load_js();
    // } 
}// function view donation by cheque ends


function view_donation_by_banktransfer() 
{
    global $wpdb;    
    // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
    faq_load_css();
    if ($_GET['update']) 
    {
        
        if($_POST['update-status']) 
        {
            $uid = $_GET['update'];
            $u_b_status = $_POST['udonation-status'];
            global $wpdb;    
            $wpdb->update(
                    'wp_donation',
                    array(
                    'status' => $u_b_status,   
                    ),
                    array( 'id' => $uid ),
                    array(
                    '%s',
                    '%s',
                    ),
                    array( '%d' )
            );
        }
        $wid = $_GET['update'];
        echo "<h2>Update Status</h2>";
        $ws = $wpdb->get_results("SELECT * FROM wp_donation WHERE id = $wid AND payment_method LIKE 'Bank Transfer'");
        $ustatus ='';
        $ustatus .="<form method='post' action=''>";
        $ustatus .= "<div class='l-left'>Transaction ID:</div>";
        $ustatus .= "<div class='l-right'>";
        $ustatus .= $ws[0]->transaction_id;
        $ustatus .= "</div></br>";
        $ustatus .= "<div class='l-left'>Name Of Donor:</div>";
        $ustatus .= "<div class='l-right'>";
        $ustatus .= $ws[0]->name_of_donor;
        $ustatus .= "</div></br>";
        $ustatus .= "<div class='l-left'>Originating Account:</div>";
        $ustatus .= "<div class='l-right'>";
        $ustatus .= $ws[0]->originating_account;
        $ustatus .= "</div></br>";
        $ustatus .= "<div class='l-left'>Status Now:</div>";
        $ustatus .= "<div class='l-right'>";
        $ustatus .= $ws[0]->status;
        $ustatus .= "</div></br>";
        $ustatus .= "<div class='l-left'>Update Status:</div>";
        $ustatus .= "<div class='l-right'>";
        $ustatus .= "<select name = 'udonation-status'>";
        $ustatus .= "<option value=''>Select Status Here</option>";
        $ustatus .= "<option value='pending'>Pending</option>";
        $ustatus .= "<option value='processing'>Processing</option>";
        $ustatus .= "<option value='successful'>Successful</option>";
        $ustatus .= "</select>";
        $ustatus .= "</div></br>";
        $ustatus .="<input type='hidden' name='update-status' id='update-status' value='status' />";
        $ustatus .="<input type='submit' value='Update Status' />";
        $ustatus .="</form>";
        echo "<div id='u-school' style='width:800px;'>".$ustatus."</div>";
    }
    echo "<form action='.' method='post'>";
    echo "<input class='itin' name='donation-download' type='submit' value='Download Donation' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
    echo "</form>";
    echo "<h2>Donation By Bank Transfer</h2>";
    $result = $wpdb->get_results("SELECT * FROM wp_donation WHERE payment_method = 'Bank Transfer'");
    // $result = mysqli_query($con,"SELECT * FROM `wp_donation` WHERE `payment_method` = 'Bank Transfer'");
    echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
    echo "<table class='loc-table'style='empty-cells:show;'>";
    echo "<th>ID</th>";
    echo "<th>Date & Time</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Pancard No.</th>";
    echo "<th>Contact</th>";
    echo "<th>Address</th>";
    echo "<th>Total Amount</th>";
    echo "<th>Payement Method</th>";
    echo "<th>Name Of Donor</th>";
    echo "<th>Originating Account</th>";
    echo "<th>Status</th>";
    echo "<th>Transaction Id</th>";
    // while($row = mysqli_fetch_array($result)) 
    while($row = $result) 
    {
        $id = $row['id'];
        $date = $row['date'];
        $time = $row['time'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $email = $row['email'];
        $pan_num = $row['pan_num'];
        $contact = $row['contact'];
        $place = $row['address1'];
        $address = $row['address2'];
        $city = $row['city'];
        $state = $row['state'];
        $country = $row['country'];
        $total_amount = $row['total_amount'];
        $payment_method = $row['payment_method'];
        $name_of_donor = $row['name_of_donor'];
        $originating_account = $row['originating_account'];
        $status = $row['status'];
        $transaction_id = $row['transaction_id'];
        echo "<tr value='$id'>";
        echo "<td>" . $id. "</td>";
        echo "<td>" . $date."-".$time. "</td>";
        echo "<td>" . $fname." ". $lname. "</td>";
        echo "<td>" . $email. "</td>";
        echo "<td>" . $pan_num. "</td>";
        echo "<td>" . $contact. "</td>";
        echo "<td>" . $place.",".$address.",".$city.",".$state.",".$country."</td>";
        echo "<td>" . $total_amount. "</td>";
        echo "<td>" . $payment_method. "</td>";
        echo "<td>" . $name_of_donor. "</td>";
        echo "<td>" . $originating_account. "</td>";
        echo "<td>" . $status. "</td>";
        echo "<td>" . $transaction_id. "</td>";
        echo "<td><a href='/wp-admin/admin.php?page=donation_by_banktransfer&update=".$id."'>Edit</a></td>";
        echo "<td><input type='button' name='reply' id='$id' class='reply_contact' value='Reply'></td>";
        echo "<td><input type='button' name='detail' id='$id' class='detail_contact' value='Detail'></td>";
        echo "<div class='plugin_box plugin_box-$id'>    <!-- OUR content_box  DIV-->";
        echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
        echo "<a class='pluginBoxClose'>Close</a>";
        echo "<div class='projectcontent'>";
        echo    "<div class='select-style'>
                <form method='post' action='.'>
                From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to' readonly><br/>
                Subject:&nbsp;&nbsp;<input type='text' name='subject'><br/>
                <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                </form>
                </div>";
        echo "</div>";
        echo "</div><!-- content_box -->";
        echo "<div class='detail_box detail_box-$id'>    <!-- OUR content_box  DIV-->";
        echo "<h2 style='font-weight:bold;text-align:center;font-size:30px;'>Donation Detail #".$id."</h2>";
        echo "<a class='detailBoxClose'>Close</a>";
        echo "<div class='projectcontent'>";
        echo "Name:".$fname." ".$lname."</br>";
        echo "Transaction Id:".$transaction_id."</br>";

        $detailresult = $wpdb->get_results("SELECT * FROM wp_donation_project WHERE transaction_id = '$transaction_id'");
        // $detailresult = mysqli_query($con,"SELECT * FROM `wp_donation_project` WHERE transaction_id = '$transaction_id'");

        // while($detailrow = mysqli_fetch_array($detailresult)) 
        while($detailrow = $detailresult) 
        {
            $id = $detailrow['id'];
            $pcategory_name = $detailrow['category_name'];
            $pproject_name = $detailrow['project_name'];
            $porder_id = $detailrow['order_id'];
            $ptransaction_id = $detailrow['transaction_id'];
            $pamount = $detailrow['amount'];                               
            echo $id." ".$pcategory_name." ".$pproject_name." ".$porder_id." ".$ptransaction_id." ".$pamount."</br>";
        }
        echo "</div>";
        echo "</div><!-- content_box -->";
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    faq_load_js();
    // } 
}
function view_career() 
{
    // $con=mysqli_connect("localhost","ccmtAdmin","#us6sTek","data_gcmw");
    // if (mysqli_connect_errno())
    // {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }
    // else
    // {
        faq_load_css();
        echo "<form action='.' method='post'>";
                echo "<input class='itin' name='career-download' type='submit' value='Download Career' style='background-color:white;border:none;color:#000;font-size:15px;cursor:pointer;'>";
        echo "</form>";
        echo "<h2>Career Form</h2>";
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM wp_career");
        // $result = mysqli_query($con,"SELECT * FROM `wp_career`");
        echo "<div style='width:1138px;max-height:800px;overflow-x: auto;overflow-y:auto;'>";
        echo "<table class='loc-table'>";
        echo "<th>ID</th>";
        echo "<th>Job Code</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Copied Resume</th>";
        echo "<th>Preference</th>";
        echo "<th>Resume</th>";
        echo "<td></td>";
        // while($row = mysqli_fetch_array($result))
        while($row = $result)
        {
            $cid = $row['id'];
            $jobcode = $row['job_code'];
            $name = $row['name'];
            $email = $row['email'];
            $resume = $row['resume'];
            $preference = $row['preferences'];
            $attachement = $row['attachement'];
            $order = explode('/',$attachement);
            $res = $order[5];
            echo "<tr id='$cid;>";
            echo "<form action='.' method='post' name='career'>";
            echo "<td>" . $cid. "</td>";
            echo "<td>" . $jobcode. "</td>";
            echo "<td>" . $name. "</td>";
            echo "<td>" . $email. "</td>";
            echo "<td>" . $resume. "</td>";
            echo "<td>" . $preference. "</td>";
            $link = $_SERVER['SERVER_NAME']."/".$attachement;
            echo "<td><a href='http://$link' target='_blank'>" . $res. "</a></td>";
            echo "<td><input type='button' name='reply' id='$cid' class='reply_career' value='Reply'></td>";
            echo "<div class='plugin_box plugin_box-$cid'>    <!-- OUR content_box  DIV-->";
            echo "<h1 style='font-weight:bold;text-align:center;font-size:30px;'></h1>";
            echo "<a class='pluginBoxClose'>Close</a>";
            echo "<div class='projectcontent'>";
            echo    "<div class='select-style'>
                    <form method='post' action=''>
                    From: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='from'><br/>
                    To: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='$email' name='to' readonly><br/>
                    Subject:&nbsp;&nbsp;<input type='text' name='subject' value='Thaks for your application' readonly><br/>
                    <p><span style='vertical-align:top;'>Message:</span><textarea rows='5' cols='30' name='message' ></textarea></p>
                    <div style='width:520px;margin-left:200px;'><input type='submit' name='submit' value='Send'></div>
                    </form>
                    </div>";
            echo "</div>";
            echo "</div><!-- content_box -->";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        faq_load_js();
    //}
}
function faq_load_css()
{

?>
<!-- stylesheet start here -->    
<style>
    /* content_box DIV-Styles*/
    .plugin_box {
        display:none; /* Hide the DIV */
        position:fixed;
        _position:absolute; /* hack for internet explorer 6 */
        height:300px;
        width:600px;
        background:#FFFFFF;
        left: 385px;
        top: 100px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;
        line-height: 25px;
        /* additional features, can be omitted */
        border:2px solid #CCCCCC;
        padding:15px;
        /*font-size:15px; */
        -moz-box-shadow: 0 0 5px #CCCCCC;
        -webkit-box-shadow: 0 0 5px #CCCCCC;
        box-shadow: 0 0 5px #CCCCCC;
    }
    .plugin_box
    #container {
        background: #d2d2d2; /*Sample*/
        width:100%;
        height:100%;
    }
    a{
        cursor: pointer;
        text-decoration:none;
    }
    /* This is for the positioning of the Close Link */
    .pluginBoxClose {
        font-size:20px;
        line-height:15px;
        right:5px;
        top:5px;
        position:absolute;
        color:#6fa5e2;
        font-weight:500;
    }
/* content_box DIV-Styles*/
    .detail_box {
        display:none; /* Hide the DIV */
        position:fixed;
        _position:absolute; /* hack for internet explorer 6 */
        height:300px;
        width:600px;
        background:#FFFFFF;
        left: 385px;
        top: 100px;
        z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
        margin-left: 15px;
        line-height: 25px;
        /* additional features, can be omitted */
        border:2px solid #CCCCCC;
        padding:15px;
        /*font-size:15px; */
        -moz-box-shadow: 0 0 5px #CCCCCC;
        -webkit-box-shadow: 0 0 5px #CCCCCC;
        box-shadow: 0 0 5px #CCCCCC;
    }
    .detail_box
    #container {
        background: #d2d2d2; /*Sample*/
        width:100%;
        height:100%;
    }

    /* This is for the positioning of the Close Link */
    .detailBoxClose {
        font-size:20px;
        line-height:15px;
        right:5px;
        top:5px;
        position:absolute;
        color:#6fa5e2;
        font-weight:500;
    }
</style>
<!-- stylesheet ends here -->
<?php
    
}   

function faq_load_js()
{

?>

<script type="text/javascript">
    jQuery(document).ready(function(){ 
        jQuery("#wpbody-content").css({ // this is just for style       
                "overflow": "visible!important" 
        });
        var status = "";        
        jQuery('.reply_contact').click( function() {
                status = jQuery(this).attr('id');
                loadPluginBox();
        });
        jQuery('.pluginBoxClose').click( function() {           
                unloadPluginBox();
        });
        jQuery('.detail_contact').click( function() {
                status = jQuery(this).attr('id');
                loadDetailBox();
        });
        jQuery('.detailBoxClose').click( function() {           
                unloadDetailBox();
        });
        function unloadPluginBox() {    // TO Unload the Popupbox
                jQuery('.plugin_box').fadeOut("slow");
                jQuery("#container").css({ // this is just for style       
                        "opacity": "1" 
                });
        }    
        function loadPluginBox() {    // To Load the Popupbox
                jQuery('.plugin_box-'+status).fadeIn("slow");
                jQuery("#container").css({ // this is just for style
                        "opacity": "0.3" 
                });        
        }
        function unloadDetailBox() {    // TO Unload the Popupbox
                jQuery('.detail_box').fadeOut("slow");
                jQuery("#container").css({ // this is just for style       
                        "opacity": "1" 
                });
        }    
        function loadDetailBox() {    // To Load the Popupbox
                jQuery('.detail_box-'+status).fadeIn("slow");
                jQuery("#container").css({ // this is just for style
                        "opacity": "0.3" 
                });        
        }
        var status = "";   
        jQuery(".reply_faq").click(function(){
                status = jQuery(this).attr('id');
                loadPluginBox();
        });
        var status = "";   
        jQuery(".reply_career").click(function(){
                status = jQuery(this).attr('id');
                loadPluginBox();
        });
    });
</script>
<?php
    }
?>