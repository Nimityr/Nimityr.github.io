let Memory = {
	images : document.images, // DHTML 
	leftTime : 10, // temps restant
	timer:null,    // timer
	nbAmp : 0,     // nb amp
	playing:false,  // on joue ?

	// Play
	Play(){
		if (this.playing) return
		this.playing=true
		window.clearInterval(this.timer)

		this.Message("gagne",false)	
		this.Message("perdu",false)	
		this.Message("temps",false)	

		this.leftTime = 10
		this.nbAmp=0


		document
			.getElementById("temps")
			.innerText = this.leftTime

		for (let amp of this.images){
			amp.state=(Math.random() > 0.5)
			if (amp.state) this.nbAmp ++
		}
		this.Show()
		this.Message("temps",true) // COUPLAGE !!! pas bien 
		window.setTimeout(()=>this.Hide() ,1000)
	},
	Hide(){

		for (let amp of this.images){
			amp.src="./images/off.png"
			amp.onclick = ()=>{
				if (amp.state){
					amp.src="./images/on.png"
					this.nbAmp --
					amp.onclick = null
					if (this.nbAmp == 0) 
						this.End("gagne")
				} else 
					this.End("perdu")
			}
		}
		this.timer = window.setInterval(()=>{
			this.leftTime --
			document
				.getElementById("temps")
				.innerText = this.leftTime
			if (this.leftTime == 0) this.End("perdu")
		},1000)
	},
	Show(){
		for (let amp of this.images)
			amp.src = (amp.state) ? "./images/on.png" : "./images/off.png"
	},
	End(id){
		this.Message(id,true)
		window.clearInterval(this.timer)
		this.timer= null
		this.playing = false

		for (let amp of this.images) 
			amp.onclick = null;
	},

	Message(id,b){
		document
			.getElementById(id)
			.style
			.display = b ? "block" : "none"
	}
};
