jQuery.fn.autolink = function() {
	return this.each(function() {
		var re = /(^|\s)(((([^:\/?#\s]+):)?\/\/)?(([A-Za-z0-9-]+\.)+[A-Za-z0-9-]+)(:\d+)?([^?#\s]*)(\?([^#\s]*))?(#(\S*))?)/g;
		$(this).html($(this).html().replace(re, function(match, optionalWhitespace, uri, scheme, p4, protocol, fqdn, p7, port, path, query, queryVal, fragment, fragId) {
			return (optionalWhitespace ? optionalWhitespace : '') +
				'<a href="' + (protocol ? uri : 'http://' + uri) +
				'" target="_blank">' + uri + '<\/a>';
		}));
	});
};