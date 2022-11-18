/**Description:
 * Get the src and href of scripts and styles that are loaded in the head.
 * Used in browser console.
 */

(() => {
	console.log('---------- Start JS output ----------');
	document
		.querySelectorAll('head > script')
		.forEach((script) => console.log(script.src));
	console.log('---------- End JS output ----------');
	console.log('---------- Start CSS output ----------');
	document
		.querySelectorAll('head > link')
		.forEach((css) => console.log(css.href));
	console.log('---------- End CSS output ----------');
})();
