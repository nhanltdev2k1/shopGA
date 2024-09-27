// JavaScript Document
function isEmail(s)
{
	if(s=="")
	{
		
		return false;	
	}
	if(s.indexOf(" ") >0)
	{
		
		return false;	
	}
	if(s.indexOf("@")==-1)
	{
		
		return false;	
	}
	var i=1;
	var sLength=s.length;
	if(s.indexOf(".")==-1)
	{
		
		return false;	
	}
	
	if(s.indexOf("..")!=-1)
	{
		
		return false;	
	}
	if(s.indexOf("@")!=s.lastIndexOf("@"))
	{
		
		return false;	
	}
	
	if(s.lastIndexOf(".")==s.length-1)
	{
		
		return false;	
	}
	var str="abcdefghikjlmnopqrstuvwxyz-@._";
	for(var j=0; j<s.length;j++)
		if(str.indexOf(s.charAt(j))==-1)
	         return false;
	return true;
}

 function checkInput()
	   {
	  
	   	if (document.tt_mh.txt_hoten.value=="")
		{
			alert("Chưa nhập họ tên!");
			document.tt_mh.txt_hoten.focus();
			return false;
		}
		
		 	if (document.tt_mh.txt_diachi.value=="")
		{
			alert("Chưa nhập địa chỉ !");
			document.tt_mh.txt_diachi.focus();
			return false;
		}
			if (document.tt_mh.txt_dt.value=="")
		{
			alert("Chưa nhập điện thoại!");
			document.tt_mh.txt_dt.focus();
			return false;
		}
		if (isNaN(document.tt_mh.txt_dt.value))
		{
			alert("Chưa đúng định dạng điện thoại!");
			document.tt_mh.txt_dt.focus();
			return false;
		}
		
		
			if (document.tt_mh.txt_email.value=="")
		{
			alert("Chưa nhập email!");
			document.tt_mh.txt_email.focus();
			return false;
		}
			if (!isEmail(document.tt_mh.txt_email.value))
		{
			alert("Chưa đúng định dạng email!");
			document.tt_mh.txt_email.focus();
			return false;
		}
		
		if (document.tt_mh.code.value=="")
		{
			alert("Bạn chưa nhập mã bảo mật");
			document.tt_mh.code.focus();
			return false;
		}
		
		
		
		
		
		
		
		
		
			if (document.tt_mh.txt_tieude.value=="")
		{
			alert("Chưa nhập tiêu đề!");
			document.tt_mh.txt_tieude.focus();
			return false;
		}
		/*	if (document.tt_mh.txt_nd.value=="")
		{
			alert("Chưa nhập nội dung!");
			document.tt_mh.txt_nd.focus();
			return false;
		}*/
		/*if (document.tt_mh.txt_fax.value=="")
		{
			alert("Chưa nhập fax !");
			document.tt_mh.txt_fax.focus();
			return false;
		}*/
		
		if (isNaN(document.tt_mh.txt_fax.value))
		{
			alert("Chưa đúng định dạng fax !");
			document.tt_mh.txt_fax.focus();
			return false;
		}
			
		
		return true;
	   }       	  		