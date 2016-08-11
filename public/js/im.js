/*=============================================================================
#     FileName: chat.js
#         Desc: 消息与后端通讯的chat对象，已修改成jquery对象
#       Author: jiangsf
#   LastUpdate: 2013-10-18 11:48:39
=============================================================================*/
define(function(require, exports, module){
	var $ = require('jquery');
	require('socket.io');
	$.chat = {};
	$.chat = {
		iosocket:null,
		unreadEvent:null,
		uid:0,
		port : 80,
		ready:[],
		analyzeData:null,
		events : {},	//绑定的事件
		ie: navigator.userAgent.match(/(?:\b(MS)?IE\s+|\bTrident\/7\.0;.*\s+rv:)(\d+)/), // IE Version

		//初始化socket
		init:function() {
			if (this.ie && this.ie[2] < 10) {
				this.iosocket = io('http://im.mukewang.com', {
					enablesXDR: true,
					upgrade: false,
					transports: ['polling'],
					path: '/message',
					'reconnection': true,
					'reconnectionDelay': 1000,
					'reconnectionDelayMax': 5000,
					'timeout': 600000
					//reconnectionAttempts: 5
				});
			} else {
				this.iosocket = io('http://im.mukewang.com', {
					transports: ['websocket'],
					path: '/message',
					'reconnection': true,
					'reconnectionDelay': 1000,
					'reconnectionDelayMax': 5000,
					'timeout': 600000
					//reconnectionAttempts: 5
				});
			}
			//analyzeData
			var cookie = getCookie(),
				cninfo = (cookie.cninfo || '').split('-'),
				uuid = cookie['imooc_uuid'],
				isnew = cookie['imooc_isnew']
			this.analyzeData = {
				marking: cninfo[1] || '',
				channel: cninfo[0] || '',
				uuid: uuid || '',
				//c: document.cookie,
				isnew: isnew || 1, //1新用户 2老用户
				url : window.location.href,
				uid: OP_CONFIG.userInfo && OP_CONFIG.userInfo.uid || 0,
				isweb: 1 // 1 pc web, 0 others
			}
			for (var event in this.events) {
				this.iosocket.on(event, this.events[event]);
			}
			this.iosocket.on("connect",function(){
				var chat = $.chat,
					ready = chat.ready||[],
					socket=chat.iosocket,
					i,len;
				for(i = 0,len = ready.length;i < len;i++){
					socket.emit.apply(socket,ready[i]);
				}
			});

			this.checkUnreads();
		},

		//用户登录
		login:function(uinfo) {
			uinfo.expand = this.analyzeData;
			this.iosocket.emit('login', uinfo);
		},
		emit:function(type,data){
			if(this.ready){

				this.ready.push(arguments);
			}
			else{
				this.iosocket.emit(type,data);
			}
		},
		//绑定未读消息事件
		bandUnreads:function(uid, cb) {
			if (uid && cb) {
				this.uid = uid;
			}
			this.events['unreads'] = cb;
			if (this.iosocket) {
				this.iosocket.on('unreads', cb);
			}
			//this.checkUnreads();
		},
		//检查未读消息总数
		checkUnreads:function() {
			//发送获取未读消息总数指令
			this.analyzeData.uid = this.uid;
			this.emit("unreads",this.analyzeData);
			if(this.uid>0){
				//暂时去掉，新版改版后修改 2016-01-12
				//this.emit("getremind");
			}
			
			//this.iosocket.emit('unreads', this.uid);
			//this.iosocket.emit('getremind',this.uid);
		},

		//绑定服务端响应事件
		bindEvent:function(type, cb) {
			if (this.iosocket) {

				this.iosocket.on(type, cb);
			} else {
				this.events[type] = cb;
			}
		},

		//发送指令到服务端
		send:function(type, msg) {
			this.iosocket.emit(type, msg);
		}
	}

	function getCookie(name) {
		var obj = {};
		var pairs = document.cookie.split(/ *; */);
		var pair;
		//if ('' == pairs[0]) return obj;
		for (var i = 0; i < pairs.length; ++i) {
		  pair = pairs[i].split('=');
		  obj[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
		}
		return name ? obj[name] : obj;
	}
	//绑定未读消息事件
	if (OP_CONFIG.userInfo && OP_CONFIG.userInfo.uid) {
		$.chat.bandUnreads(OP_CONFIG.userInfo.uid, function(total){
			//console.log(JSON.stringify(total));
			if (total > 0) {
				$('.msg_icon').show().html(total);
				$('#msg_new a').html('<span class="unread_num">'+total+'</span>');
			} else {
				$('.msg_icon').hide();
				$('#msg_new a').empty();

			}
		});
        
        //通知提醒（小红点）事件
		$.chat.bindEvent("remind",function(msg){
            if(msg.unreads > 0){
                $('.msg_remind').show()
            }else{
                $('.msg_remind').hide()
            }
		});
	}

});
