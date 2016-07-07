<?php
class database
{
	private static $host='shreeja.db.9462939.hostedresource.com';
	private static $uname='shreeja';
	private static $pwd='Demo1@1212';
	private static $con=NULL;
	//static uses one connection throughout whole programme. Hence it is best method to use.
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$uname,self::$pwd);
		mysql_select_db('shreeja',self::$con);
		return self::$con;
	}
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=NULL;
	}
	public function login($email,$password)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where email_id='$email' and password='$password'",$con);
		$cnt=mysql_num_rows($res);
		return $res;
		database::disconnect();
	}

	//user table
	public function userdisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl",$con);
		return $res;
		database::disconnect();
	}
	public function updateuserbypass($id,$pass)
	{
		$con=database::connect();
		$res=mysql_query("update user_tbl set password='$pass' where email_id='$id'",$con);
		return $res;
		database::disconnect();
	
	}
	public function peruserdisplay($user)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where email_id='$user'",$con);
		return $res;
		database::disconnect();
	}
	public function deleteuser($uid)
	{
		$con=database::connect();
		$res=mysql_query("delete from user_tbl where email_id='$uid'",$con);
		return $res;
		database::disconnect();
	}
	public function insertuser($email,$name,$pass,$mno,$gen,$photo)
	{
		$con=database::connect();
		$res=mysql_query("insert into user_tbl values('$email','$name','$pass','$mno',$gen','$photo','user'",$con);
		return $res;
		database::disconnect();
	}
	public function updateuser($id,$name,$mno,$gen,$photo1)
	{
		$con=database::connect();
		$res=mysql_query("update user_tbl set name='$name',mobileno='$mno',gender='$gen',photo='$photo1' where email_id='$id'",$con);
		return $res;
		database::disconnect();
	}

	//catagory table

	public function catdisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from cat_tbl",$con);
		return $res;
		database::disconnect();
	}
	public function percatdisplay($catid)
	{
		$con=database::connect();
		$res=mysql_query("select * from cat_tbl where cat_id='$catid'",$con);
		return $res;
		database::disconnect();
	}
	
	public function catadd($catname)
	{
		$con=database::connect();
		$res=mysql_query("insert into cat_tbl values (null,'$catname')",$con);
		return $res;
		database::disconnect();
	}
	public function catdelete($catid)
	{
		$con=database::connect();
		$res=mysql_query("delete from cat_tbl where cat_id='catid'",$con);
		return $res;
		database::disconnect();
	}
	public function catupdate($catname)
	{
		$con=database::connect();
		$res=mysql_query("update cat_tbl set cat_name='$catname'",$con);
		return $res;
		database::disconnect();
	}


	//comment table
	public function commentdisplay()
	{
		$con=database::connect();
		$res=mysql_query("select * from comment_tbl",$con);
		return $res;
		database::disconnect();
	}

	public function commentcount()
	{
		$con=database::connect();
		$res=mysql_query("select * from comment_tbl",$con);
		$count=mysql_num_rows($res);
		return $count;
		database::disconnect();
	}
	public function commentadd($cmntdesc,$fkblogid,$fkemailid,$date,$time)
	{
		$con=database::connect();
		$res=mysql_query("insert into comment_tbl values(null,'$cmntdesc','$fkblogid','$fkemailid','$date',
			'$time')",$con);
		return $res;
		database::disconnect();
	}
	public function commentdel($cmntid)
	{
		$con=database::connect();
		$res=mysql_query("delete from comment_tbl where comment_id='$cmntid'",$con);
		return $res;
		database::disconnect();
	}
	public function commentupdate($cmntid,$cmntdesc,$fkblogid,$fkemailid,$date,$time,$photo)
	{
		$con=database::connect();
		$res=mysql_query("update comment_tbl set comment_desc='$cmntdesc',
												  fk_blog_id'$fkblogid',
												  fk_email_id='$fkemailid',
												  date='$date',
												  time='$time',
												  photo='$photo'
												  where comment_id='$cmntid'",$con);
		return $res;
		database::disconnect();
	}

	//post table
	public function displayposts()
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl where flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function displayposts1()
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl",$con);
		return $res;
		database::disconnect();
	}
	public function singlepost($postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl as p,user_tbl as u where  p.fk_email_id=u.email_id and p.post_id='$postid' and flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function todayposts()
	{
		$con=database::connect();
		$date=date("d/m/y");
		$res=mysql_query("select * from post_tbl as p,user_tbl as u where p.fk_email_id=u.email_id and p.date='$date' and p.flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function joinposts($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl as p,user_tbl as u where p.fk_email_id=u.email_id and p.fk_email_id='$email' and p.flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function perdisplayposts($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl where fk_email_id='$email' and  flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function postbycat()
	{
		$con=database::connect();
		$res=mysql_query('select count(p.post_id)"cnt1",c.cat_name,p.fk_cat_id,c.cat_id from cat_tbl as c,post_tbl as p where  p.fk_cat_id=c.cat_id group by(c.cat_name)');
		return $res;
		database::disconnect();

	}
	public function percatposts($cat)
	{
		$con=database::connect();
		$res=mysql_query("select * from post_tbl where fk_cat_id='$cat' and flag=1",$con);
		return $res;
		database::disconnect();
	}
	public function postsinsert($posttitle,$fkcatid,$postdesc,$fkemail,$date,$time,$photo,$likes,$fkcommentid)
	{
		$con=database::connect();
		$res=mysql_query("insert into post_tbl values(null,'$posttitle','$fkcatid','$postdesc','$fkemail',
														'$date','$time','$photo','$likes','$fkcommentid'	",$con);
		return $res;			
		database::disconnect();		
	}
	public function postupdate($postid,$posttitle,$fkcatid,$postdesc,$fkemail,$date,$time,$photo,$likes,$fkcommentid)
	{
		$con=database::connect();
		$res=mysql_query("update post_tbl set post_title='$posttitle',
											  fk_cat_id='$fkcatid',
											  post_desc='$postdesc',
											  fk_email_id='$fkemail',
												date='$date',
												time='$time',
												photo='$photo',
												likes='$likes',
												fk_comment_id='$fkcommentid'
												where post_id='$postid'",$con);
		return $res;			
		database::disconnect();		
	}
	public function postdelete($postid)
	{
		$con=database::connect();
		$res=mysql_query("delete from post_tbl where post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	//like table
	public function displaylikes($postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from like_tbl where fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	public function displaylikesperemail($emailid,$postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from like_tbl where fk_email_id='$emailid' and fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	public function insertlikes($email,$postid)
	{
		$con=database::connect();
		$res=mysql_query("insert into like_tbl values('null','$email','$postid')",$con);
		return $res;
		database::disconnect();
	}
	public function deletelikes($email,$postid)
	{
		$con=database::connect();
		$res=mysql_query("delete from like_tbl where fk_email_id='$email' and fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	public function joinlikes($postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from like_tbl as l,user_tbl as u where l.fk_email_id=u.email_id and l.fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}

	//comment table
	public function commentdel1($postid)
	{
		$con=database::connect();
		$res=mysql_query("delete from comment_tbl where fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	public function displaycomments($postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from comment_tbl where fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
	public function displaycommentsperemail($emailid)
	{
		$con=database::connect();
		$res=mysql_query("select * from comment_tbl where fk_email_id='$emailid'",$con);
		return $res;
		database::disconnect();
	}
	public function joincomments($postid)
	{
		$con=database::connect();
		$res=mysql_query("select * from comment_tbl as c,user_tbl as u where c.fk_email_id=u.email_id and c.fk_post_id='$postid'",$con);
		return $res;
		database::disconnect();
	}
}
?>