let stepCount = 0;

function translateStatement() {
    let statement = document.getElementById("statement").value;

    fetch("api/translate_statement.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "statement=" + encodeURIComponent(statement)
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("preview").innerHTML = "$$" + data.latex + "$$";
        MathJax.typeset();
    });
}

function addStep() {
    stepCount++;
    let container = document.getElementById("steps");

    let div = document.createElement("div");
    div.innerHTML = `
        <textarea id="step${stepCount}" placeholder="Enter step"></textarea>
        <button onclick="verifyStep(${stepCount})">Verify</button>
        <div id="result${stepCount}"></div>
    `;
    container.appendChild(div);
}

function verifyStep(n) {
    let step = document.getElementById("step" + n).value;

    fetch("api/verify_step.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "step=" + encodeURIComponent(step)
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("result" + n).innerHTML = data.message;
    });
}