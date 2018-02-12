<!DOCTYPE html>
<html>
	<head>
		<title>Archive</title>
		<style>
			html, 
			body {
			    height: 100%;
			    width: 100%;
			}
		</style>
	</head>
	<body>
		<object data="{{ asset('storage/'.$archive->location) }}" width="100%" height="100%"></object>
		<!-- <iframe src="http://docs.google.com/gview?url={{ asset('storage/'.$archive->location) }}&embedded=true" width="100%" height="100%"></iframe> -->
		<!-- <iframe src="https://docs.google.com/gview?url=http://ieee802.org/secmail/docIZSEwEqHFr.doc&embedded=true" frameborder="0"></iframe> -->
		<!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset('storage/'.$archive->location) }}' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> -->
	</body>
</html>