/**Description:
 * Get the src and href of scripts and styles that are loaded in the head.
 * Used in browser console.
 */

(() => {
	console.log('---------- Start JS output ----------');
	const scriptResult = [...document.querySelectorAll('head > script')].map(
		(script) => ({
			id: script.id,
			src: script.src,
			isAsync: script.async,
			isDefer: script.defer,
			type: script.type,
		})
	);
	console.table(scriptResult);
	console.log('---------- End JS output ----------');
	console.log('---------- Start CSS output ----------');
	const cssResult = [...document.querySelectorAll('head > link')].map(
		(css) => ({
			id: css.id,
			href: css.href,
			as: css.as,
			rel: css.rel,
			type: css.type,
		})
	);
	console.table(cssResult);
	console.log('---------- End CSS output ----------');
})();
