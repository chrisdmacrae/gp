!function(t){t.fn.downCount=function(e,l){var u=t.extend({date:null,offset:null},e);u.date||t.error("Date is not defined."),Date.parse(u.date)||t.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.");var h=this,c=function(){var e=new Date,t=e.getTime()+6e4*e.getTimezoneOffset();return new Date(t+36e5*u.offset)};var g=setInterval(function(){var e=new Date(u.date)-c();if(e<0)return clearInterval(g),void(l&&"function"==typeof l&&l());var t=36e5,n=Math.floor(e/864e5),r=Math.floor(e%864e5/t),o=Math.floor(e%t/6e4),f=Math.floor(e%6e4/1e3),i=1===(n=2<=String(n).length?n:"0"+n)?"day":"days",a=1===(r=2<=String(r).length?r:"0"+r)?"hour":"Hrs",d=1===(o=2<=String(o).length?o:"0"+o)?"minute":"Min",s=1===(f=2<=String(f).length?f:"0"+f)?"second":"Sec";h.find(".days").text(n),h.find(".hours").text(r),h.find(".minutes").text(o),h.find(".seconds").text(f),h.find(".days_ref").text(i),h.find(".hours_ref").text(a),h.find(".minutes_ref").text(d),h.find(".seconds_ref").text(s)},1e3)}}(jQuery); 