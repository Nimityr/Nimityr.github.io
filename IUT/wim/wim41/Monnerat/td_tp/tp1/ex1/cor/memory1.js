let Memory = {
	//images : document.querySelectorAll('img'),
	images : document.images, // images du memory
	leftTime : 10,   // temps restant à afficher
	playing : false, // une partie est en cours ou non
	timer : null,
	nbAmp:0,

	Play(){
		if (this.playing) return
		this.playing = true
		this.leftTime = 10
		this.nbAmp = 0
		// couplage vue.js, angular.js react.js ember.js meteor.js
		document.getElementById('gagne').style.display = 'none'
		document.getElementById('perdu').style.display = 'none'
		document.getElementById('temps').style.display = 'block'
		document.getElementById('temps').innerText = this.leftTime

		for( let amp of this.images){
			amp.state = (Math.random()>0.5)
			if (amp.state) this.nbAmp ++
		}
		this.Show()
		window.setTimeout(()=>this.Hide(),1000)

	},
	Hide(){
		for (let amp of this.images){
			amp.src = "./images/off.png"
			amp.onclick = ()=>{
				amp.onclick = null
				if (amp.state){
					amp.src = './images/on.png'
					this.nbAmp --
					if (this.nbAmp == 0) this.End(true)
				} else
					this.End(false)
			}
		}
		this.timer =window.setInterval(()=>{
			this.leftTime --
			document
				.getElementById('temps')
				.innerText = this.leftTime
			if (this.leftTime == 0) 
				this.End(false)

		},1000)
	},
	Show(){
		for (let amp of this.images) 
			amp.src = (amp.state) ? './images/on.png' : './images/off.png'
	},
	End(v){
		for (let amp of this.images) 
			amp.onclick = null
		window.clearInterval(this.timer)
		this.playing = false
		if (v){
			document
				.getElementById('gagne')
				.style
				.display = "block"
		} else {

			document
				.getElementById('perdu')
				.style
				.display = "block"
		}
	}
}
