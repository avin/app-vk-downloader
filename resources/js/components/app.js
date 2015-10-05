'use strict';

var React = require('react');
var Reflux = require('reflux');
var audioStore = require('../stores/audioStore');
var actions = require('../actions/actions');

var APP = React.createClass({
    mixins: [Reflux.connect(audioStore,"audio")],
    componentDidMount: function () {
        actions.getAudioData()
    },
    render: function () {
        var _prepare = ((navigator.language || navigator.userLanguage) == 'ru') ? 'Подготовка к скачиванию...' : 'Preparing...';
        var _downloading = ((navigator.language || navigator.userLanguage) == 'ru') ? 'Загружается...' : 'Downloading...';
        var _error = ((navigator.language || navigator.userLanguage) == 'ru') ? 'Что то пошло не так' : 'Something wrong';
        var _useDirectLink = ((navigator.language || navigator.userLanguage) == 'ru') ? 'Если скачивание не началось, используй' : 'If downloading did not start, use ';
        var _linkLabel = ((navigator.language || navigator.userLanguage) == 'ru') ? 'прямую ссылку' : 'direct link';

        if (this.state.audio.hasOwnProperty('error')) {
            return (
                <h2>{_error} <span className="text-danger">:(</span></h2>
            )
        }
        if (this.state.audio.hasOwnProperty('artist')) {
            var artist = this.state.audio.artist;
            var title = this.state.audio.title;
            var fileName = this.state.audio.artist + ' - ' + this.state.audio.title + '.mp3';
            actions.downloadFile(this.state.audio.url, fileName)

            return (
                <div className="slideDown">
                    <h3>{_downloading}</h3>
                    <p>
                        <strong>{artist} - {title}</strong>
                        <hr/>
                        { _useDirectLink } <a href={this.state.audio.url}>{ _linkLabel }</a>
                    </p>
                </div>
            )
        }
        return (
            <h2 className="text-muted pulse bottom-right">{_prepare}</h2>
        )
    }
});
module.exports = APP;