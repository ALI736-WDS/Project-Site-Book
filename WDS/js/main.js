const filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;

function do_register()
{
	const username = document.getElementById('username') ;
	const email = document.getElementById('email') ;
	const password1 = document.getElementById('password1') ;
	const password2 = document.getElementById('password2') ;
	
	const msg_username = document.getElementById('msg_username') ;
	const msg_email = document.getElementById('msg_email') ;
	const msg_email_motabar = document.getElementById('msg_email_motabar') ;
	const msg_password1 = document.getElementById('msg_password1') ;
	const msg_password2 = document.getElementById('msg_password2') ;
	const msg_password1_2 = document.getElementById('msg_password1_2') ;
	
	
		//usename
		if(username.value=="")
		{
//			alert('لطفا نام کاربری خود را وارد کنید')
			msg_username.style.display="block" ;
			username.focus();
			return false;	
		}else{
			msg_username.style.display="none" ;
		}
	
		//email
		if(email.value=="")
		{
//		alert('لطفا ایمیل خود را وارد کنید')
			msg_email.style.display="block" ;
			email.focus();
			return false;
		}
		else if(filter.test(email.value)==false)
		{
//			alert('آدرس ایمیل شما معتبر نمی باشد')
			msg_email.style.display="none" ;
			msg_email_motabar.style.display="block" ;
			email.focus();
			return false;
		}else{
			msg_email_motabar.style.display="none" ;
		}
		
		//password1
		if(password1.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_password1.style.display="block" ;
			password1.focus();
			return false;
		}else{
			msg_password1.style.display="none" ;
		}
		
		//password2
		if(password2.value=="")
		{
//			alert('لطفا تکرار گذرواژه خود را وارد کنید')
			msg_password2.style.display="block" ;
			password2.focus();
			return false;
		}else{
			msg_password2.style.display="none" ;
		}
	
		//password1_2
		if(password1.value!=password2.value)
		{
//			alert('گذرواژه‌باهم مطابقت ندارند')
			msg_password1_2.style.display="block" ;
			password2.focus();
			return false;
		}else{
			msg_password1_2.style.display="block" ;
		}
} //end of function do_register()

function do_login()
{
	const login_email = document.getElementById('login_email') ;
	const login_password1 = document.getElementById('login_password1') ;
	
	const login_msg_email = document.getElementById('login_msg_email') ;
	const login_msg_email_motabar = document.getElementById('login_msg_email_motabar') ;
	const login_msg_password1 = document.getElementById('login_msg_password1') ;
	
	
		//email
		if(login_email.value=="")
		{
//		alert('لطفا ایمیل خود را وارد کنید')
			login_msg_email.style.display="block" ;
			login_email.focus();
			return false;
		}
		else if(filter.test(login_email.value)==false)
		{
//			alert('آدرس ایمیل شما معتبر نمی باشد')
			login_msg_email.style.display="none" ;
			login_msg_email_motabar.style.display="block" ;
			login_email.focus();
			return false;
		}else{
			login_msg_email_motabar.style.display="none" ;
		}
		
		//password1
		if(login_password1.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			login_msg_password1.style.display="block" ;
			login_password1.focus();
			return false;
		}else{
			login_msg_password1.style.display="none" ;
		}	
}

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function add_edit_blog()
{
	const title = document.getElementById('title') ;
	const editor1 = document.getElementById('editor1') ;
//	const writer = document.getElementById('writer') ;
	const readtime = document.getElementById('readtime') ;
	const image = document.getElementById('image') ;
	const tags = document.getElementById('tags') ;
	
	const msg_title = document.getElementById('msg_title') ;
	const msg_editor1 = document.getElementById('msg_editor1') ;
//	const msg_writer = document.getElementById('msg_writer') ;
	const msg_readtime = document.getElementById('msg_readtime') ;
	const msg_image = document.getElementById('msg_image') ;
	const msg_tags = document.getElementById('msg_tags') ;
	
	
		//title
		if(title.value=="")
		{
//		alert('لطفا ایمیل خود را وارد کنید')
			msg_title.style.display="block" ;
			title.focus();
			return false;
		}
		else{
			msg_title.style.display="none" ;
		}
		
		//editor1
		if(editor1.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_editor1.style.display="block" ;
			editor1.focus();
			return false;
		}else{
			msg_editor1.style.display="none" ;
		}
	
		//writer
//		if(writer.value=="")
//		{
////			alert('لطفا گذرواژه خود را وارد کنید')
//			msg_writer.style.display="block" ;
//			writer.focus();
//			return false;
//		}else{
//			msg_writer.style.display="none" ;
//		}
	
		//readtime
		if(readtime.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_readtime.style.display="block" ;
			readtime.focus();
			return false;
		}else{
			msg_readtime.style.display="none" ;
		}
	
		//image
		if(image.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_image.style.display="block" ;
			image.focus();
			return false;
		}else{
			msg_image.style.display="none" ;
		}
	
		//tags
		if(tags.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_tags.style.display="block" ;
			tags.focus();
			return false;
		}else{
			msg_tags.style.display="none" ;
		}
}

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function add_edit_writer()
{
	const username = document.getElementById('username') ;
	const editor1 = document.getElementById('editor1') ;
	const image = document.getElementById('image') ;
	
	const msg_username = document.getElementById('msg_username') ;
	const msg_editor1 = document.getElementById('msg_editor1') ;
	const msg_image = document.getElementById('msg_image') ;

	
		//username
		if(username.value=="")
		{
//		alert('لطفا ایمیل خود را وارد کنید')
			msg_username.style.display="block" ;
			username.focus();
			return false;
		}
		else{
			msg_username.style.display="none" ;
		}
		
		//editor1
		if(editor1.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_editor1.style.display="block" ;
			editor1.focus();
			return false;
		}else{
			msg_editor1.style.display="none" ;
		}
	
		//image
		if(image.value=="")
		{
//			alert('لطفا گذرواژه خود را وارد کنید')
			msg_image.style.display="block" ;
			image.focus();
			return false;
		}else{
			msg_image.style.display="none" ;
		}
}

///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////// clock ////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

function showTime() {
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    let session = "AM";

    if (h === 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? `0${h}` : h;
    m = (m < 10) ? `0${m}` : m;
    s = (s < 10) ? `0${s}` : s;

    let time = `IR: ${h}:${m}:${s} ${session}`;
    document.querySelector(".clock").innerText = time;
}

setInterval(showTime, 1000)