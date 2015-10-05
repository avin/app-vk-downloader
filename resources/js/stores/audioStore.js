'use strict';

var Reflux  = require('reflux');
var actions = require('../actions/actions');
var request = require('superagent');
var Arrow = window.Arrow;

var audioStore = Reflux.createStore({
    listenables: [actions],
    onDownloadFile: function(fileUrl, fileName){
        Arrow.show(10000);

        var isChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
        var isSafari = navigator.userAgent.toLowerCase().indexOf('safari') > -1;

        //iOS devices do not support downloading. We have to inform user about this.
        if (/(iP)/g.test(navigator.userAgent)) {
            alert('Your device does not support files downloading. Please try again in desktop browser.');
            return false;
        }

        //If in Chrome or Safari - download via virtual link click
        if (isChrome || isSafari || 1) {
            //Creating new link node.
            var link = document.createElement('a');
            link.href = fileUrl;

            if (link.download !== undefined) {
                //Set HTML5 download attribute. This will prevent file from opening if supported.
                link.download = fileName;
            }

            //Dispatching click event.
            if (document.createEvent) {
                var e = document.createEvent('MouseEvents');
                e.initEvent('click', true, true);
                link.dispatchEvent(e);
                return true;
            }
        }

        // Force file download (whether supported by server).
        if (fileUrl.indexOf('?') === -1) {
            fileUrl += '?download';
        }

        window.open(fileUrl, '_self');
        return true;
    },
    onGetAudioData: function(){
        var href = window.location.href;
        var audioId = href.substr(href.lastIndexOf('/') + 1);

        request.post('/api/getAudioData')
            .send({ audioId: audioId })
            .set('Accept', 'application/json')
            .type('application/x-www-form-urlencoded')
            .end(function(err, res){

                if (res.body.flag){
                    setTimeout(function() {
                        this.updateAudio(res.body.data.response[0])
                    }.bind(this), 1000)
                } else {
                    this.setError(res.body.message)
                }
            }.bind(this));
    },
    setError: function(message){
        this.audio = {
            error: message
        };
        this.trigger(this.audio);
    },
    updateAudio: function(audio){
        this.audio = audio;
        this.trigger(audio);
    },
    getInitialState: function() {
        this.audio = {};
        return this.audio;
    }
});

module.exports = audioStore;