var playing = false, animFrame, cinemaLights = true

const canvas = document.querySelector(".video-wrapper canvas")

const canvasCtx = canvas.getContext("2d")

const videoPlayer = document.querySelector(".video-player")

const video = document.querySelector(".video-player video")

const playBtn = document.querySelector(".video-player #play-btn")

const fullscreenBtn = document.querySelector(".video-player #fullscrn-btn")

const cinemaLightsBtn = document.querySelector(".video-player #cinema-lights-btn")

const progress = document.querySelector(".video-player #progress")

const volume = document.querySelector(".video-player #volume")

const mute = document.querySelector(".video-player #mute")

const ellapsedTime = document.querySelector(".video-player #ellapsed_time")

const totalTime = document.querySelector(".video-player #total_time")

const draw = () => {
  if(cinemaLights) {
		animFrame = window.requestAnimationFrame(draw)
		canvasCtx.drawImage(video, 0, 0, canvas.width, canvas.height)
	}
}

const nonce = (e) => {
	e.stopPropagation(); 
	e.preventDefault()
}

const playFx = (e) => {
	e.preventDefault()
	e.stopPropagation()
	if (playing) {
		video.pause()
		playBtn.querySelector("span").innerHTML = "play_arrow"
		window.cancelAnimationFrame(animFrame)
		animFrame = undefined
	} else {
		video.play()
		playBtn.querySelector("span").innerHTML = "pause"
		draw()
	}
	
	playing = !playing
}

const fullscreen = (e) => {
	e.preventDefault()
	e.stopPropagation()
	video.webkitRequestFullScreen();
}

const cinemaLightsSwitch = (e) => {
	e.preventDefault()
	e.stopPropagation()
	cinemaLights = !cinemaLights
	if(!cinemaLights) {
		canvasCtx.clearRect(0, 0, canvas.width, canvas.height);
	} else {
		draw()
	}
}

const toggleMute = (e) => {
	e.preventDefault()
	e.stopPropagation()
	if(video.volume > 0) {
		video.volume = volume.value = 0;
		mute.querySelector("span").innerHTML = "volume_off"
	} else {
		video.volume = volume.value = 1;
		mute.querySelector("span").innerHTML = "volume_up"
	}
}

const changeVolume = (e) => {
	e.stopPropagation;
	e.preventDefault;
	video.volume = e.target.value;
	
	if(video.volume > 0.5) {
		mute.querySelector("span").innerHTML = "volume_up"
	} else if (video.volume == 0 ) {
		mute.querySelector("span").innerHTML = "volume_off"
	} else {
		mute.querySelector("span").innerHTML = "volume_down"
	}
}

const setTime = (e) => {
	e.stopPropagation;
	e.preventDefault;
	video.currentTime = e.target.value;
	ellapsedTime.innerHTML = 		formatTime(video.currentTime)
}

const formatTime = (t) => {
	let time = t / 60
	
	let min = Math.floor(time)
	let sec = Number(Math.floor((time - min) * 60)).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})
	
	return new String(min + ":" + sec)
}


video.ontimeupdate = () => {
	progress.value = video.currentTime
	progress.max = video.duration
	ellapsedTime.innerHTML = 		formatTime(video.currentTime)
}

video.onloadedmetadata = () => {
		canvasCtx.drawImage(video, 0, 0, canvas.width, canvas.height)
	volume.value = video.volume
	ellapsedTime.innerHTML = formatTime(video.currentTime)
	progress.value = video.currentTime
	totalTime.innerHTML = formatTime(video.duration)
	progress.max = video.duration
}

video.onended = () => {
	isPlaying = false
	let a = {
		"target": {
			"value": 0
		}
	}
	setTime(a)
	playBtn.querySelector("span").innerHTML = "play_arrow"
	window.cancelAnimationFrame(animFrame)
	animFrame = undefined
}

playBtn.onclick = playFx
videoPlayer.onclick = playFx
fullscreenBtn.onclick = fullscreen
cinemaLightsBtn.onclick = cinemaLightsSwitch
volume.onchange = changeVolume
volume.onclick = nonce
mute.onclick = toggleMute
progress.onchange = setTime
progress.onclick = nonce