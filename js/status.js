


function doalert() {
  const reflectWrap = document.getElementById("reflect_prog");
  const planWrap = document.getElementById("plan_prog");
  const observeWrap = document.getElementById("observe_prog");
  const actWrap = document.getElementById("act_prog");
  const switchReflect = document.getElementById("reflect");
  const switchPlan = document.getElementById("plan");
  const switchObserve = document.getElementById("observe");
  const switchAct = document.getElementById("act");

  // ReflectWrap checked function
  if (switchReflect.checked) {
    reflectWrap.style.display = 'block';
  } else {
    reflectWrap.style.display = 'none';
  }

  // ReflectWrap checked function
  if (switchPlan.checked) {
    planWrap.style.display = 'block';
  } else {
    planWrap.style.display = 'none';
  }

  // ReflectWrap checked function
  if (switchObserve.checked) {
    observeWrap.style.display = 'block';
  } else {
    observeWrap.style.display = 'none';
  }

  // ReflectWrap checked function
  if (switchAct.checked) {
    actWrap.style.display = 'block';
  } else {
    actWrap.style.display = 'none';
  }
}
