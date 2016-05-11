/* 
 * General functions, constants ... that are available at all domains
 */
window.addEventListener('DOMContentLoaded', function() 
{
	if (typeof(requirejs) !== "undefined")
	{
		requirejs(['jquery','njPage'], function() 
		{
			console.log('tx_njpage per jsrequire loaded');
		});
	}
}); //end of window.addEventListener('DOMContentLoaded')