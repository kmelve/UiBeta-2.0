!function($,t,a,n){"use strict";Foundation.libs.accordion={name:"accordion",version:"5.2.3",settings:{active_class:"active",multi_expand:!1,toggleable:!0,callback:function(){}},init:function(t,a,n){this.bindings(a,n)},events:function(){var t=this,a=this.S;a(this.scope).off(".fndtn.accordion").on("click.fndtn.accordion","["+this.attr_name()+"] > dd > a",function(n){var e=a(this).closest("["+t.attr_name()+"]"),s=a("#"+this.href.split("#")[1]),i=a("dd > .content",e),c=$("dd",e),d=t.attr_name()+"="+e.attr(t.attr_name()),o=e.data(t.attr_name(!0)+"-init"),l=a("dd > .content."+o.active_class,e);return n.preventDefault(),e.attr(t.attr_name())&&(i=i.add("["+d+"] dd > .content"),c=c.add("["+d+"] dd")),o.toggleable&&s.is(l)?(s.parent("dd").toggleClass(o.active_class,!1),s.toggleClass(o.active_class,!1)):(o.multi_expand||(i.removeClass(o.active_class),c.removeClass(o.active_class)),s.addClass(o.active_class).parent().addClass(o.active_class),void o.callback(s))})},off:function(){},reflow:function(){}}}(jQuery,window,window.document);