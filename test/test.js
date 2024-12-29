const progress = document.getElementById('progress')  
const prev = document.getElementById('prev')  
const next = document.getElementById('next')  
const circles = document.querySelectorAll('.circle')   
let currentActive = 1  
next.addEventListener('click', () => {  
  currentActive++  
  if(currentActive > circles.length) {  
    currentActive = circles.length
  }  
  update()  
})  
prev.addEventListener('click', () => {  
  currentActive--  
  if(currentActive < 1) {  
    currentActive = 1  
  }  
  update()  
})  
function update() {  
  circles.forEach((circle, idx) => {  
    if(idx < currentActive) {  
      circle.classList.add('active') 
    } else {  
      circle.classList.remove('active')  
    }  
  })  
  const actives = document.querySelectorAll('.active')  
  progress.style.width = (actives.length - 1) / (circles.length - 1) * 100 + '%'  
  if(currentActive === 1) {  
    prev.disabled = true  
  } else if(currentActive === circles.length) {  
    next.disabled = true  
  } else {  
    prev.disabled = false  
    next.disabled = false  
  }  
}

//-------------------------------------------------------------------------------------------------------------------------

const progress2 = document.getElementById('progress2')  
const prev2 = document.getElementById('prev2')  
const next2 = document.getElementById('next2')  
const circles2 = document.querySelectorAll('.kircle')   
let currentActive2 = 1  
next2.addEventListener('click', () => {  
  currentActive2++  
  if(currentActive2 > circles2.length) {  
    currentActive2 = circles2.length
  }  
  update2()  
})  
prev2.addEventListener('click', () => {  
  currentActive2--  
  if(currentActive2 < 1) {  
    currentActive2 = 1  
  }  
  update2()  
})  
function update2() {  
  circles2.forEach((kirkle, idx) => {  
    if(idx < currentActive2) {  
      kirkle.classList.add('active2') 
    } else {  
      kirkle.classList.remove('active2')  
    }  
  })  
  const actives2 = document.querySelectorAll('.active2')  
  progress2.style.width = (actives2.length - 1) / (circles2.length - 1) * 100 + '%'  
  if(currentActive2 === 1) {  
    prev2.disabled = true  
  } else if(currentActive2 === circles2.length) {  
    next2.disabled = true  
  } else {  
    prev2.disabled = false  
    next2.disabled = false  
  }  
}

//-------------------------------------------------------------------------------------------------------------------------

const progress3 = document.getElementById('progress3')  
const prev3 = document.getElementById('prev3')  
const next3 = document.getElementById('next3')  
const circles3 = document.querySelectorAll('.fircle')   
let currentActive3 = 1  
next3.addEventListener('click', () => {  
  currentActive3++  
  if(currentActive3 > circles3.length) {  
    currentActive3 = circles3.length
  }  
  update3()  
})  
prev3.addEventListener('click', () => {  
  currentActive3--  
  if(currentActive3 < 1) {  
    currentActive3 = 1  
  }  
  update3()  
})  
function update3() {  
  circles3.forEach((firkle, idx) => {  
    if(idx < currentActive3) {  
      firkle.classList.add('active3') 
    } else {  
      firkle.classList.remove('active3')  
    }  
  })  
  const actives3 = document.querySelectorAll('.active3')  
  progress3.style.width = (actives3.length - 1) / (circles3.length - 1) * 100 + '%'  
  if(currentActive3 === 1) {  
    prev3.disabled = true  
  } else if(currentActive3 === circles3.length) {  
    next3.disabled = true  
  } else {  
    prev3.disabled = false  
    next3.disabled = false  
  }  
}


//-------------------------------------------------------------------------------------------------------------------------

const progress4 = document.getElementById('progress4')  
const prev4 = document.getElementById('prev4')  
const next4 = document.getElementById('next4')  
const circles4 = document.querySelectorAll('.lircle')   
let currentActive4 = 1  
next4.addEventListener('click', () => {  
  currentActive4++  
  if(currentActive4 > circles4.length) {  
    currentActive4 = circles4.length
  }  
  update4()  
})  
prev4.addEventListener('click', () => {  
  currentActive4--  
  if(currentActive4 < 1) {  
    currentActive4 = 1  
  }  
  update4()  
})  
function update4() {  
  circles4.forEach((lirkle, idx) => {  
    if(idx < currentActive4) {  
      lirkle.classList.add('active4') 
    } else {  
      lirkle.classList.remove('active4')  
    }  
  })  
  const actives4 = document.querySelectorAll('.active4')  
  progress4.style.width = (actives4.length - 1) / (circles4.length - 1) * 100 + '%'  
  if(currentActive4 === 1) {  
    prev4.disabled = true  
  } else if(currentActive4 === circles4.length) {  
    next4.disabled = true  
  } else {  
    prev4.disabled = false  
    next4.disabled = false  
  }  
}