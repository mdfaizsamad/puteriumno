// ==UserScript==
// @name         UNIEC CAMPUS UI AUTOMATION / TESTING
// @namespace    https://github.com/ahmyi/unitar
// @version      0.3
// @description  For Web UI Testing
// @author       ahmyi
// @match        http://localhost/unitar/*
// @grant        none
// @run-at document-end
// ==/UserScript==
if ('loading' == document.readyState) {
  alert("Nenja is not runnnig on complete state.");
}
//Rewrite function if not exists
if (typeof unsafeWindow === 'undefined') {
    var unsafeWindow    = ( function () {
        var dummyElem   = document.createElement('a');
        dummyElem.setAttribute ('onclick', 'return window;');
        return dummyElem.onclick ();
    })();
//    var unsafeWindow = this.window;
}
var GMApp = new function(){
    var self = this;
    self.Config = {
        debug:true
    };
    var body = null;
    var debug = self.debug = function(msg){
        if (self.Config.debug === true){
            if (typeof GM_log === 'undefined' || typeof msg.toString() ==='undefined' || typeof msg !== 'string'){
                console.log(msg);
            }else{
                GM_log(msg);
            }
        }
    };//EOF log
    var init = function(){
    	self.body = document.getElementsByTagName('body')[0];
        var tmp = document.createElement('div');
    	tmp.style.display='none';
        tmp.id = 'GM_TBD_tmp';
    	self.tmp = tmp;
        self.body.appendChild(tmp);
        var d1= document.createElement('div');
        d1.id = 'qunit';
        var d2= document.createElement('div');
        d2.id = "qunit-fixture";
        var debugkit = document.getElementById("debug-kit-toolbar");
        if(debugkit){
            debugkit = debugkit.childNodes[1];
            var li = document.createElement('li');
            li.className  = "panel-tab";

            var li_a = document.createElement('a');
            li_a.href ="#qunit";
            li_a.innerHTML = "QUnit";

            var li_div = document.createElement('div');
            li_div.className  = "panel-content";
            li_div.id="qunit-tab";

            var li_div_a = document.createElement('a');
            li_div_a.href='#';
            li_div_a.className ="panel-toggle ui-control ui-button";
            li_div_a.innerHTML = "+";

            var li_div_a2 = document.createElement('a');
            li_div_a2.href='#';
            li_div_a2.className ="panel-toggle ui-control ui-button";
            li_div_a2.innerHTML = "S";


            li_div_a2.onclick = function(){
                if(QUnit){
                    QUnit.start();
                }

            }

            var li_div_div = document.createElement('div');
            li_div_div.className ="panel-resize-region";

            var li_div_div_div = document.createElement('div');
            li_div_div_div.className ="panel-content-data";

            var li_div_div_div_h2 = document.createElement('h2');
            li_div_div_div_h2.innerHTML ='QUnit Testing';

            var li_div_div_div2 = document.createElement('div');//Contents here
            li_div_div_div2.className ="panel-content-data panel-qunit";
            li_div_div_div2.id="qunit-qunit";

            var li_div_div2 = document.createElement('div');
            li_div_div2.className ="panel-resize-handle ui-control";
            li_div_div2.innerHTML='====';

            li_div_div_div2.appendChild(d1);
            li_div_div_div2.appendChild(d2);

            li_div_div_div.appendChild(li_div_div_div_h2);
            li_div_div.appendChild(li_div_div_div);
            li_div_div.appendChild(li_div_div_div2);
            li_div.appendChild(li_div_a);
            li_div.appendChild(li_div_a2);
            li_div.appendChild(li_div_div);
            li_div.appendChild(li_div_div2);
            li.appendChild(li_a);
            li.appendChild(li_div);

            debugkit.insertBefore(li, debugkit.childNodes[3]);
            var ss = $("#debug-kit-toolbar .panel-content");
            for (var i = 0; i < ss.length; i++) {
                   ss[i].style.height = 'calc(90vh)';
            }
        }
        self.appendCss(CakeApp.request.base+'/css/qunit.css');
    };//EOF init
    //request Represents what is displayed at chatbox.
    self.request = {
		path:unsafeWindow.location.pathname,
		url:unsafeWindow.location.href,
		socket : (("WebSocket" in window)===true),
	};//EOF TBDRequest
    var headTag  = null;
    self.appendCss = function(css){
      if(headTag===null){
        headTag = document.getElementsByTagName('head')[0];
      }
      var tmp = document.createElement('link');
      tmp.rel = 'stylesheet';
//      tmp.media = 'all';
      tmp.type = "text/style";
      tmp.href = css;
      headTag.appendChild(tmp);
    };
    self.response={
    };
    var bootstrap=function(){
        if ( typeof unsafeWindow.jQuery === 'undefined') {
            return window.setTimeout(bootstrap, 100);
        }
        //jquery = unsafeWindow.jQuery = unsafeWindow.jQuery.noConflict(true);
        requirejs(['jquery','qunit'],function($,QUnit){
          $(document).ready(function(){
                  init();
          });


          require(['app/monkey/'+CakeApp.module].concat(self.plugins.js));
        });
    };
    self.plugins = {
        css : ['http://code.jquery.com/qunit/qunit-1.18.0.css'],
        js : [],
        src : [],
       //Enabled plugins lists
	};//EOF Plugins

    bootstrap();
};
