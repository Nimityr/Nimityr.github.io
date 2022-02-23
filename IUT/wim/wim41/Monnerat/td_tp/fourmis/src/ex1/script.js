const ANTUP    = 0
const ANTRIGHT = 1
const ANTDOWN  = 2
const ANTLEFT  = 3

class Ant {
	x = 0
	y = 0

	direction = ANTRIGHT

	moveForward(width, height) {

		if (this.direction == ANTUP) {
			this.y++;
		}
		else if (this.direction == ANTRIGHT) {
			this.x++;
		}
		else if (this.direction == ANTDOWN) {
			this.y--
		}
		else if (this.direction == ANTLEFT) {
			this.x--;
		}

	}

	rotateRight() {
		if (this.direction == ANTUP) {
			this.direction = ANTRIGHT;
		}
		else if (this.direction == ANTRIGHT) {
			this.direction = ANTDOWN;
		}
		else if (this.direction == ANTDOWN) {
			this.direction = ANTLEFT;
		}
		else if (this.direction == ANTLEFT) {
			this.direction = ANTUP;
		}
	}

	rotateLeft() {
		if (this.direction == ANTUP) {
			this.direction = ANTLEFT;
		}
		else if (this.direction == ANTLEFT) {
			this.direction = ANTDOWN;
		}
		else if (this.direction == ANTDOWN) {
			this.direction = ANTRIGHT;
		}
		else if (this.direction == ANTRIGHT) {
			this.direction = ANTUP;
		}
	}
}

class GridManager {
	ACTIVE_COLOR = 'black';
	INACTIVE_COLOR = 'white';

	gridContainerId;
	gridSize;
	grid = [];
	ant;   // la fourmi

	constructor(gridSize, gridContainerId,ant) {
		if (!gridSize || gridSize < 30) {
			throw new Error('The grid size must be at least 30');
		}

		if (!gridContainerId) {
			throw new Error('gridContainerId must be set');
		}

		this.gridSize = gridSize;
		this.gridContainerId = gridContainerId;
		this.ant = ant
		this.ant.x = this.ant.y = gridSize/2
		this.createGrid();
	}

	createGrid() {
		const container = document.getElementById(this.gridContainerId);

		for (let i = 0; i < this.gridSize; i++) {
			const row = document.createElement('div');
			row.className = 'row';

			const gridRow = [];

			for (let j = 0; j < this.gridSize; j++) {
				const cell = document.createElement('div');
				cell.className = 'cell';
				cell.style.backgroundColor = this.INACTIVE_COLOR;
				row.appendChild(cell);

				gridRow.push(cell);
			}

			container.appendChild(row);
			this.grid.push(gridRow);
		}
	}

	destroyGrid() {
		for (let x = 0; x < this.gridSize; x++) {
			for (let y = 0; y < this.gridSize; y++) {
				const node = this.grid[y][x];
				node.parentNode.removeChild(node);
			}
		}

		const container = document.getElementById(this.gridContainerId);
		while (container.firstChild) {
			container.removeChild(container.lastChild);
		}

		this.grid = [];
	}

	setInitialState(initialState) {
		const coords = initialState.split(';').map(coord => coord.split(','));
		coords.forEach((coord) => this.activeCell(+coord[0], +coord[1]));
	}

	isInGridRange(x, y) {
		return x >= 0 && x < this.gridSize && y >= 0 && y < this.gridSize;
	}

	isActiveCell(x, y) {
		return this.isInGridRange(x, y) && this.grid[y][x].style.backgroundColor === this.ACTIVE_COLOR;
	}

	activeCell(x, y) {
		if (!this.isInGridRange(x, y)) {
			return;
		}

		this.grid[y][x].style.backgroundColor = this.ACTIVE_COLOR;
	}

	deactiveCell(x, y) {
		if (!this.isInGridRange(x, y)) {
			return;
		}

		this.grid[y][x].style.backgroundColor = this.INACTIVE_COLOR;
	}

		logCurrentGridState() {
		const activeCells = [];

		for (let x = 0; x < this.gridSize; x++) {
			for (let y = 0; y < this.gridSize; y++) {
				if (this.isActiveCell(x, y)) {
					activeCells.push(`${x},${y}`);
				}
			}
		}

		console.log(activeCells.join(';'));
	}
}
// -----------------------------------------------------------------------------------------------------------------


const INITIAL_STATE = ''
const STEP_INTERVAL = 5 
const DIV_CONTAINER_ID = 'container'
const BTN_AUTOPLAY_ID = 'autoplay'
const BTN_RESTART_ID = 'restart'
const BTN_NEXT_MOVE_ID = 'next-move'
const MOVE_VAL_ID = 'move-value'
const GRID_SIZE_VAL_ID = 'grid-size-value'
const BTN_PLUS_100_ID = 'plus-100'

function computeNextPosition(gridManager)
{
	gridManager.ant.moveForward();
	if (gridManager.isActiveCell(gridManager.ant.x,gridManager.ant.y)) {
		gridManager.deactiveCell(gridManager.ant.x,gridManager.ant.y);
		gridManager.ant.rotateRight();

	}else{
		gridManager.activeCell(gridManager.ant.x,gridManager.ant.y);
		gridManager.ant.rotateLeft();
	}
}


// Fonction principale de la simulation
function main() {
	let autoplayInterval
	let gridSize = 50
	let generation = 0
	let nbMove = 0
	let ant = new Ant()
	let gridManager = new GridManager(gridSize, DIV_CONTAINER_ID,ant)
	gridManager.setInitialState(INITIAL_STATE);


	// Lorsqu'un utilisateur clique sur 'Auto Play'
	document.getElementById(BTN_AUTOPLAY_ID).addEventListener('click', () => {
		if (autoplayInterval) {
			return
		}
		autoplayInterval = setInterval(() => {
			computeNextPosition(gridManager);
		}, STEP_INTERVAL);
	})

	// Lorsqu'un utilisateur clique sur 'Next move'
	document.getElementById(BTN_NEXT_MOVE_ID).addEventListener('click', () => {
		computeNextPosition(gridManager);
	})

	// Lorsqu'un utilisateur clique sur '+100'
	document.getElementById(BTN_PLUS_100_ID).addEventListener('click', () => {
		for ( let i = 0; i < 100; i++){
			computeNextPosition(gridManager);
		}
	})

	// Lorsqu'un utilisateur clique sur 'restart'
	document.getElementById(BTN_RESTART_ID).addEventListener('click', () => {
		gridManager.destroyGrid();
		gridManager.createGrid();

	})

	// Lorsqu'un utilisateur clique sur 'restart'
	document.getElementById(BTN_RESTART_ID).addEventListener('click', () => {

	})
}


// La simulation  est démarrée ici
main()
