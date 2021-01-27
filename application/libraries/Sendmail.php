<?php defined('BASEPATH') OR exit('No direct script access allowed');


Class Sendmail
{

        
  public function sendemailverification($to,$username,$user_id)
    {
        
          $subject='Verify Your Email';
          $message='<h2 color="blue">Verify Your Email</h2>
          <h4>Hello'.$username.',</h4>
          <p>We’ve received a request to verify your email address. If you didn’t make the request, just ignore this email. 
          Otherwise, you can verify your email using this link:</p>
          <h3 color="green"><a href="'.base_url().'VerifyEmail/'.base64_encode($to).'/'.base64_encode($user_id).'">Click here to verify your email address</a></h3>
          <p>Sincerely,</p>
         <p>The Crowdfunding Team</p>';
          
       
        $status= $this->send($to,$message,$subject);
        return $status;
        
    }
    public function sendsupportemailverification($to,$campaign_id)
    {
        
          $subject='Verify Your Email';
          $message='<h2 color="blue">Verify Your Email</h2>
          <h4>You are almost there</h4>
          <p>Thank you for being a part of the Crowdfunding community! Please verify your email address by clicking the button below. A valid email address ensures that your backers will be able to reach you.. 
          Otherwise, you can verify your email using this link:</p>
          <h3 color="green"><a href="'.base_url().'VerifySupportEmail/'.$campaign_id.'/'.base64_encode($to).'">Click here to verify your email address</a></h3>
          <p>Sincerely,</p>
         <p>The Crowdfunding Team</p>';
          
       
        $status= $this->send($to,$message,$subject);
        return $status;
        
    }
     public function sendinvitationemailverification($to,$campaign_id,$title)
    {
        
          $subject='Verify Your Email';
          $message='<h2 color="blue">You’re Invited!</h2>
          <h3>Hello '.$to.',</h3>
          <h4>Congratulations,</h4>
          <p>'.$to.' would like to add you to the ‘'.$title.'’ team on Crowdfunding, the world’s leading international funding platform. This means'.$to.' thinks you’d bring additional greatness to the team – please consider joining so you can add your energy and drive to this campaign!.</p>
          <h3 color="green"><a href="'.base_url().'VerifyInvitationEmail/'.$campaign_id.'/'.base64_encode($to).'"> To join the team and get involved,.Click Here.</a></h3>
          <p>Sincerely,</p>
         <p>The Crowdfunding Team</p>';
          
       
        $status= $this->send($to,$message,$subject);
        return $status;
        
    }
    public function sendregisteremail($to,$username)
    {
        
         $subject='Thanking you for register on Yachts';
          $message='<h1 color="blue"> Welcome</h1><h2 color="blue">Dear '.$username.' </h2>
          <h4>You are almost there</h4>
          <p>Thank you for being a part of the Yachts community!
          <p>Sincerely,</p>
         <p>The Yachts Team</p>';
          
       
        $status= $this->send($to,$message,$subject);
        return $status;
        
    }
    public function sendotpemail($to,$username,$otp)
    {
        
         $subject='Password reset Email';
          $message='<h1 color="blue"> Welcome</h1><h2 color="blue">Dear '.$username.' </h2>
          <h4>You Otp is:'.$otp.'</h4>
          <p>Thank you for being a part of the Hayaan Academy community!
          <p>Sincerely,</p>
         <p>The Hayaan Academy Team</p>';
          
       
        $status= $this->send($to,$message,$subject);
        return $status;
        
    }
    public function send($to,$message,$subject)
    {

         $CI =& get_instance();
         $CI->load->library('email');
         $from_email = "shrinkcom@hayaanacademy.com"; 
        $to_email = $to; 
         $config['mailtype'] = 'html';
         $CI->email->initialize($config);
         $CI->email->from($from_email, 'Hayaan Academy'); 
         $CI->email->to($to_email);
         $CI->email->subject($subject); 
         $CI->email->message($message);
         if($CI->email->send()) {
         
             return true;
         }else{
         
           return false;
         } 
   
    }


}
