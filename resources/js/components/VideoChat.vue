<template>
    <div>
        <div id="stream-wrapper">
            <div id="video-streams"></div>
            <div id="stream-controls">
                <button id="stopMic-btn" v-on:click="muteMicro()"><i class="fa fa-microphone-slash"></i></button>
                <button style="display: none;" id="mic-btn" v-on:click="unmuteMicro()"><i class="fa fa-microphone"></i></button>
                <button v-on:click="disconnect()" id="leave-btn"><i class="fa fa-phone"></i></button>
                <button id="stopCamera-btn" v-on:click="muteCamera()"><i class="fa fa-video-camera"></i></button>
                <button style="display: none;" id="camera-btn" v-on:click="unmuteCamera()"><i class="fa fa-video-camera"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'video-chat',
    props: ['useremail', 'roomname', 'userid'],
    data: function () {
        return {
            accessToken: '',
            room: '',
        }
    },
    methods : {
        getAccessToken : function () {
            const _this = this
            const axios = require('axios')
            // Request a new token
            axios.get('/api/access_token/'+this.useremail+'/'+this.roomname+'/'+this.userid)
                .then(function (response) {
                    _this.accessToken = response.data
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    _this.connectToRoom()
                });
        },
        connectToRoom : async function () {
            const _this = this
            const { connect, createLocalVideoTrack } = require('twilio-video');
            
            // Join to the Room with the given AccessToken and ConnectOptions.
            this.room = await connect(this.accessToken, { audio: true, video: { width: 640, height: 640 } });
            
            // Make the Room available in the JavaScript console for debugging.
            window.room = this.room;
            this.addLocalParticipant(this.room.localParticipant)
            // Subscribe to the media published by RemoteParticipants already in the Room.
            this.room.participants.forEach(participant => this.addRemoteParticipant(participant));
            this.room.on('participantConnected', participant => this.addRemoteParticipant(participant));
        },
        addLocalParticipant: function(participant) {
            
            // Create the video container
            this.createVideoContainer(participant)
            // Attach the 
            participant.tracks.forEach(publication => {
                
                if ('audio' == publication.kind)
                    return
                this.publishTrack(publication.track, participant)
            })
        },
        addRemoteParticipant: function(participant) {
            this.createVideoContainer(participant)
            // Set up listener to monitor when a track is published and ready for use
            participant.on('trackSubscribed', track => {
                this.publishTrack(track, participant);
            });
        },
        createVideoContainer: function (participant) {
            // Add a container for the Participant's media.
            const div = document.createElement('div');
            div.id = participant.sid;
            div.setAttribute('class', 'video-container');
            document.getElementById('video-streams').appendChild(div);
            
        },
        publishTrack: ( track, participant ) => {
            const videoContainer = document.getElementById(participant.sid);
            videoContainer.appendChild(track.attach())
        },
        disconnect : function(){
            this.room.on('disconnected', room => {
                // Detach the local media elements
                this.room.localParticipant.tracks.forEach(publication => {
                    const attachedElements = publication.track.detach();
                    attachedElements.forEach(element => element.remove());
                });
            });
            // To disconnect from a Room
            this.room.disconnect();
            window.location.href = "http://127.0.0.1:8000/";
        },
        unmuteMicro : function(){
            this.room.localParticipant.audioTracks.forEach(publication => {
                publication.track.enable();
                document.getElementById('stopMic-btn').setAttribute('style', 'display: initial;');
                document.getElementById('mic-btn').setAttribute('style', 'display: none;');
            });
        },
        muteMicro : function(){
            this.room.localParticipant.audioTracks.forEach(publication => {
                publication.track.disable();
            });
            document.getElementById('stopMic-btn').setAttribute('style', 'display: none;');
            document.getElementById('mic-btn').setAttribute('style', 'display: initial;');
        },
        unmuteCamera : function(){
            this.room.localParticipant.videoTracks.forEach(publication => {
                publication.track.enable();
            });
            document.getElementById('stopCamera-btn').setAttribute('style', 'display: initial;');
            document.getElementById('camera-btn').setAttribute('style', 'display: none;');
        },
        muteCamera : function(){
            this.room.localParticipant.videoTracks.forEach(publication => {
                publication.track.disable();
            });
            document.getElementById('stopCamera-btn').setAttribute('style', 'display: none;');
            document.getElementById('camera-btn').setAttribute('style', 'display: initial;');
        },
    },
    mounted : function () {
        this.getAccessToken()
    }
}
</script>