const statUA = navigator.userAgent.toLowerCase();
const statRegexp = /(bot|crawl|spider|slurp|sohu-search|lycos|robozilla|sogou|monitor|yahoo!|ia_archiver')/
if(!statRegexp.test(statUA)) {
	const cookietimes = new Date().getTime();
	var storage = window.localStorage;
	if(!storage.getItem('fes_statnum')) storage.setItem('fes_statnum', cookietimes);
	if(storage.getItem('fes_statnum')){
		var xhr = new XMLHttpRequest();
		xhr.open("GET", '/site/count', true);
		xhr.withCredentials = true;
		//xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		//xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.send();
	}
}