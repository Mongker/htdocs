//####################################################
// $uery Handle
//####################################################
(function($)
{
	$(document).ready(function()
	{
		
		// Ckeditor
		$('.editor').each(function()
		{
			var id = $(this).attr('id');
			
			var config = $(this).attr('_config');
			config = (config) ? JSON.parse(config) : {};
			
			CKEDITOR.replace(id, config).on("change", function()
			{
				CKEDITOR.instances[id].updateElement();
			});
		});
		
		// Lightbox 
		$('.lightbox').colorbox();
		
		// Number format
		$('.format_number').number(true);
		
		// Currency format
		$('.format_currency').formatCurrency({
			roundToDecimalPlace: 0,
			symbol: ''
		});
		$('.format_currency').blur(function()
		{
			$(this).formatCurrency({
				roundToDecimalPlace: 0,
				symbol: ''
			});
		});
		
		//Xác thực xóa dữ liệu
		$('a.verify_action').click(function(){
			if(!confirm('Bạn chắc chắn muốn xóa ?'))
			{
				return false;
			}
		});
		
		// Autocomplete
		var cache = {}, lastXhr;
		$('.autocomplete').each(function()
		{
			var url_search = $(this).attr('_url');
			
			$(this).autocomplete(
			{
				minLength: 2,
				source: function(request, response)
				{
					var term = request.term;
					
					if (term in cache)
					{
						response(cache[term]);
						return;
					}
		
					lastXhr = $.getJSON(url_search, request, function(data, status, xhr)
					{
						cache[term] = data;
						if (xhr === lastXhr)
						{
							response(data);
						}
					});
				}
			});
		});
		
		// Tags
		$('.tags').each(function()
		{
			var _t = $(this);
			
			var setting = {
			   'width': '100%',
			   'defaultText': _t.attr('_tags_text')
			};
			
			var ac_url = _t.attr('_tags_ac');
			if (ac_url)
			{
				setting.autocomplete_url = ac_url
			}
			
			_t.tagsInput(setting);
		});
		
		// Sort col table
		$('table td.sortCol').each(function()
		{
			var _t = $(this);
			var html = '<div>'+_t.html()+'<span></span></div>';
			_t.html(html);
		});
		

		// List handle
		var $list_filter	= $('.list_filter');
		var $list_item 		= $('.list_item');
		
		$list_item.find('.view_of_field').click(function()
		{
			var param = $(this).attr('_param');
			var value = $(this).attr('_value');
			
			$list_filter.find('[name='+param+']').val(value);
			$list_filter.submit();
			
			return false;
		});
		
		//xoa nhieu du lieu
		var $list_action 	= $('.list_action');//tim toi the co class = list_action
		$list_action.find('#submit').click(function(){ //tim toi the co id = submit,su kien click
			if(!confirm('Bạn chắc chắn muốn xóa tất cả dữ liệu ?'))
			{
				return false;
			}
			
			var ids = new Array();
			$('[name="id[]"]:checked').each(function()
			{
				ids.push($(this).val());
			});
			
			if (!ids.length) return false;
			
			//link xoa du lieu
		    var url  = $(this).attr('url');
		   
			//ajax để xóa
			$.ajax({
				url: url,
				type: 'POST',
				data : {'ids': ids},
				success: function()
				{
					$(ids).each(function(id, val)
					{
						//xoa cac the <tr> chua danh muc tung ung
						$('tr.row_'+val).fadeOut();			
					});
				}
				
			})
			return false;
		});
		
		// Form filter handle
		var form = $('form[name=filter]');
		
		form.find('.view_of_field').click(function()
		{
			var param = $(this).attr('_param');
			var value = $(this).attr('_value');
			
			form.find('[name='+param+']').val(value);
			form.submit();
			
			return false;
		});
		
		
		// Load uri
		var uri = window.location.href.split('#uri=');
		if (uri[1])
		{
			$.colorbox({
				href: admin_url+uri[1],
				opacity: 0.75
			});
		}
		
		$('.load_uri').click(function()
		{
			var uri = $(this).attr('_url');
			uri = (!uri) ? $(this).attr('href') : uri;
			uri = uri.replace(admin_url, '');
			
			window.location.href = '#uri='+uri;
		});
		
	});
})(jQuery);


//####################################################
// Main function
//####################################################

/**
 * Chuyen tieng viet khong dau
 */
function convert_vi_to_en(str) 
{  
	  str= str.toLowerCase();  
	  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
	  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
	  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
	  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
	  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
	  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
	  str= str.replace(/đ/g,"d");  
	  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
	  /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */ 
	  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
	  str= str.replace(/^\-+|\-+$/g,"");  
	  //cắt bỏ ký tự - ở đầu và cuối chuỗi  
	  return str;  
}  



/**
 * An pages khi ko co chia trang
 */
function auto_check_pages(t)
{
	if (t.find('a')[0] == undefined)
	{
		t.remove();
	}
}

/**
 * Tim kiem va thay the chuoi
 */
function str_replace (search, replace, subject, count) 
{
	
	  var i = 0,
	    j = 0,
	    temp = '',
	    repl = '',
	    sl = 0,
	    fl = 0,
	    f = [].concat(search),
	    r = [].concat(replace),
	    s = subject,
	    ra = Object.prototype.toString.call(r) === '[object Array]',
	    sa = Object.prototype.toString.call(s) === '[object Array]';
	  s = [].concat(s);
	  if (count) {
	    this.window[count] = 0;
	  }

	  for (i = 0, sl = s.length; i < sl; i++) {
	    if (s[i] === '') {
	      continue;
	    }
	    for (j = 0, fl = f.length; j < fl; j++) {
	      temp = s[i] + '';
	      repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
	      s[i] = (temp).split(f[j]).join(repl);
	      if (count && s[i] !== temp) {
	        this.window[count] += (temp.length - s[i].length) / f[j].length;
	      }
	    }
	  }
	  return sa ? s : s[0];
}

