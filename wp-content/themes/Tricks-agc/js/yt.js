function ytlist(data) {
                var feed = data.feed;
                var entries = feed.entry || [];
                var html = ['<ul class="yt-related">'];
                for (var i = 0; i < entries.length; i++) {
                        var entry = entries[i];
                        var thumbnailUrl = entries[i].media$group.media$thumbnail[0].url;
                        var playerUrl = entries[i].media$group.media$content[0].url;
                        html.push('<li onclick="loadVideo(\'', playerUrl, '\', true)">', '<img src="', thumbnailUrl, '" width="130" height="90"/>', '</span></li>');
                }
                html.push('</ul><br style="clear: left;"/>');
                document.getElementById('ytlist').innerHTML = html.join('');
                if (entries.length > 0) {
                        loadVideo(entries[0].media$group.media$content[0].url, false);
                }
        }
        function loadVideo(playerUrl, autoplay) {
                var atts = {
                        id: 'ytbox'
                };
                swfobject.embedSWF(playerUrl + '&fs=1&enablejsapi=1&autoplay=' + (autoplay ? 1 : 0), 'player', '500', '300', '9.0.0', false, false, {
                        allowfullscreen: 'true'
                }, {
                        allowscriptaccess: 'always' 
                });
        }
        function setVisibility(id, visibility) {
                document.getElementById(id).style.display = visibility;
        }