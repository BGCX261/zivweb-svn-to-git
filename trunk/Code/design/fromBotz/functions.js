/* scrollTo jQuery extention */
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('3.R=6(e){7 l=0;7 t=0;7 w=3.a(3.X(e,\'1e\'));7 h=3.a(3.X(e,\'1f\'));7 m=e.L;7 B=e.F;1a(e.S){l+=e.T+(e.8?3.a(e.8.W):0);t+=e.V+(e.8?3.a(e.8.10):0);e=e.S}l+=e.T+(e.8?3.a(e.8.W):0);t+=e.V+(e.8?3.a(e.8.10):0);c{x:l,y:t,w:w,h:h,m:m,B:B}};3.1d=6(e){b(e){w=e.k;h=e.C}f{w=(d.Y)?d.Y:(1.4&&1.4.k)?1.4.k:1.9.L;h=(d.H)?d.H:(1.4&&1.4.C)?1.4.C:1.9.F}c{w:w,h:h}};3.U=6(e){b(e){t=e.i;l=e.A;w=e.r;h=e.D}f{b(1.4&&1.4.i){t=1.4.i;l=1.4.A;w=1.4.r;h=1.4.D}f b(1.9){t=1.9.i;l=1.9.A;w=1.9.r;h=1.9.D}}c{t:t,l:l,w:w,h:h}};3.a=6(v){v=12(v);c 14(v)?0:v};3.16.E=6(s){o=3.17(s);c u.18(6(){n 3.P.E(u,o)})};3.P.E=6(e,o){7 z=u;z.o=o;z.e=e;z.p=3.R(e);z.s=3.U();z.J=6(){1b(z.j);z.j=1c};z.t=(n N).Z();z.M=6(){7 t=(n N).Z();7 p=(t-z.t)/z.o.I;b(t>=z.o.I+z.t){z.J();11(6(){z.q(z.p.y,z.p.x)},13)}f{G=((-g.O(p*g.Q)/2)+0.5)*(z.p.y-z.s.t)+z.s.t;K=((-g.O(p*g.Q)/2)+0.5)*(z.p.x-z.s.l)+z.s.l;z.q(G,K)}};z.q=6(t,l){d.19(l,t)};z.j=15(6(){z.M()},13)};',62,78,'|document||jQuery|documentElement||function|var|currentStyle|body|intval|if|return|window||else|Math||scrollTop|timer|clientWidth||wb|new|||scroll|scrollWidth|||this||||||scrollLeft|hb|clientHeight|scrollHeight|ScrollTo|offsetHeight|st|innerHeight|duration|clear|sl|offsetWidth|step|Date|cos|fx|PI|getPos|offsetParent|offsetLeft|getScroll|offsetTop|borderLeftWidth|css|innerWidth|getTime|borderTopWidth|setTimeout|parseInt||isNaN|setInterval|fn|speed|each|scrollTo|while|clearInterval|null|getClient|width|height'.split('|'),0,{}))

$(function(){
		   
	$("#header ul li a").hover(function(){
			$(this).parent().addClass("hover");
		},function(){
			$(this).parent().removeClass("hover");
	});

	$('#catalogList a').each(function(){
		$(this).append("<b></b>");
	}).hover(function(){
			$(this).find("b").show();
		},function(){
			$(this).find("b").hide();
	})
	.lightBox();

	
});