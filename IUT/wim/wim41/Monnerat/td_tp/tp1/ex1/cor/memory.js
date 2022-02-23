const Memory = {
	images : document.images, // DHTML
	// images : document.querySelectorAll('img')
	leftTime : 10,
	nbAmp : 0,
	playing : false,
	timer : null,

	Play(){
		if (this.playing) return 
		this.playing = true
		this.leftTime = 10
		this.nbAmp = 0
		// pas bien 
		// couplage controleur les images de la vue
		document.getElementById('gagne').style.display = "none"
		document.getElementById('perdu').style.display = "none"
		document.getElementById('temps').style.display = "block"
		document.getElementById('temps').innerText = this.leftTime
		// Tirage aléatoire
		for (let amp of this.images){
			amp.state = (Math.random() > 0.5)
			if (amp.state) 
				this.nbAmp ++
		}
		this.Show()
		window.setTimeout(()=>this.Hide(),1000)
	},
	Show(){
		for (let amp of this.images)
			if (amp.state)
				amp.src = './images/on.png'
		else 
			amp.src = './images/off.png'
	},
	Hide(){
		for (let amp of this.images){
			amp.src = './images/off.png'
			amp.onclick = ()=>{
				amp.onclick = null
				if (amp.state){
					amp.src = './images/on.png'
					this.nbAmp --
					if (this.nbAmp == 0) 
						this.End(true) // victoire
				} else 
					this.End(false)
			}
		}
		this.timer = window.setInterval(
			()=>{
				this.leftTime --
				document
					.getElementById('temps')
					.innerText = this.leftTime
				if (this.leftTime == 0) 
					this.End(false)
			}	,1000)

	}
	,
	End(v){
		window.clearInterval(this.timer)
		this.timer=null
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
		for (let amp of this.images)
			amp.onclick = null
	}

}
