(function($)
{
	$(document).ready(function()
	{
		var main = $(s_main);
		
		// Update thong tin file hien tai
		update_file_info();

		// Khai bao cac bien
		var upload_info = main.find('.upload_info');
		var upload_error = main.find('.upload_error');
		var upload_action = main.find('.upload_action');
		
		var uploader = new plupload.Uploader({
			runtimes: 'gears,html5,flash,silverlight,browserplus',
			browse_button: 'action_upload',
			max_file_size: s_config_max_size+'mb',
			url: s_url_upload,
			multi_selection: false,
			flash_swf_url: s_plugin_path+'/plupload.flash.swf',
			silverlight_xap_url: s_plugin_path+'/plupload.silverlight.xap',
			filters: [ {title : "Files", extensions: s_config_extensions} ]
		});
		
		
		// Khi file duoc chon
		uploader.bind('FilesAdded', function(up, files)
		{
			// Hien thi thong tin file
			var params = {
							file_name: files[0].name,
							file_size: plupload.formatSize(files[0].size),
							file_progress: '0'
						};
			upload_info.html(temp_set_value(main.find('#temp #upload_info').html(), params)).show();
			
			// An thong tin loi
			upload_error.hide();
			
			// An nut upload
			upload_action.hide();
			
			// Reposition Flash/Silverlight
			up.refresh();
		});

		// Khi file duoc chon xong
		uploader.bind('QueueChanged', function(up)
		{
			// Bat dau upload
			uploader.start();
		});

		// Upload progress
		uploader.bind('UploadProgress', function(up, file)
		{
			// Cap nhat progress
			upload_info.find('.progress').css('width', file.percent+'%');
		});
		
		// Upload hoan thanh
		uploader.bind('UploadComplete', function(up, files)
		{
			// Chay url update
			if (s_url_update != '')
			{
				$.get(s_url_update);
			}
			
			// Cap nhat thong tin file
			update_file_info();
			
			// An thong tin file upload
			upload_info.hide();
			
			// An thong tin loi
			upload_error.hide();
			
			// Hien thi nut upload
			upload_action.show();
		});
		
		// Error
		uploader.bind('Error', function(up, err)
		{
			// Hien thi loi
			var params = {
							file_error: err.message,
							file_name: err.file.name,
							file_size: plupload.formatSize(err.file.size)
						};
			upload_error.html(temp_set_value(main.find('#temp #upload_error').html(), params)).show();
			
			// An thong tin file
			upload_info.hide();
			
			// Hien thi nut upload
			upload_action.show();

			// Reposition Flash/Silverlight
			up.refresh();
		});
		
		// Khoi dong uploader
		uploader.init();
		
		
		// Xoa file
		var is_deleting = false;
		upload_action.find('#action_del').click(function()
		{
			if (is_deleting == false)
			{
				is_deleting = true;
				
				$(this).nstUI({
					method:	"loadAjax",
					loadAjax:{
						url: $(this).attr('href'),
						field: {load:'_', show:''},
						event_complete: function(data)
						{
							is_deleting = false;

							// Chay url update
							if (s_url_update != '')
							{
								$.get(s_url_update);
							}
			
							// Cap nhat thong tin file hien tai
							update_file_info();

							// An thong bao loi
							main.find('.upload_error').hide();
						}
					}
				});
			}

			return false;
		});
	});

	/**
	 * Cap nhat thong tin file da upload
	 */
	function update_file_info()
	{
		var main = $(s_main);
		
		$(this).nstUI({
			method:	"loadAjax",
			loadAjax:{
				url: s_url_get,
				field: {load:'_', show:''},
				datatype: 'json',
				event_complete: function(data)
				{
					var upload_complete = main.find('.upload_complete');
					upload_complete.hide();
					
					if (data != null)
					{
						if (data.id && data.id > 0)
						{
							var params = {
											file_name: data.orig_name,
											file_size: data._size,
											url_download: data._url_download
										};
							var html = temp_set_value(main.find('#temp #upload_complete').html(), params);
							upload_complete.html(html).fadeIn();
						}
						
						main.find('.upload_action #action_del').attr('href', data._url_del);
					}
				}
			}
		});
	}
	
})(jQuery);