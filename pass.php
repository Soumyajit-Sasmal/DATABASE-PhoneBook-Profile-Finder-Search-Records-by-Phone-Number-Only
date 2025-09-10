<html>
<style>
    body {
        background: rgba(0, 0, 20, 1);
        color: white;
        font-family: verdana;
    }

    form {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.7);
        width: fit-content;
        padding: 4vh;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    #gauge-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        margin-bottom: 2vh;
    }

    .gauge-segment {
        width: 30px;
        height: 15px;
        border-radius: 4px;
        background-color: gray;
        transition: background-color 0.3s ease;
    }

    input {
        width: 20vw;
        height: 6vh;
        border: 1px solid white;
        background: rgba(0, 0, 20, 1);
        padding: 2vh;
        color: white;
        border-radius: 8px;
        outline: none;
        font-size: 1rem;
        transition: 0.3s ease;
        box-shadow: inset 0 0 5px rgba(255, 255, 255, 0.1);
    }

    input:focus {
        border-color: cyan;
        box-shadow: 0 0 10px cyan;
    }

    .bar {
        margin-top: 2vh;
        height: 4.5vh;
        text-align: center;
        line-height: 4.5vh;
        border-radius: 12px;
        font-weight: bold;
        font-size: 1rem;
        font-family: 'Arial Black', sans-serif;
        letter-spacing: 1px;
        color: white;
        text-shadow: 1px 1px 2px black;
        background: linear-gradient(to right, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        transition: all 0.4s ease-in-out;
        backdrop-filter: blur(3px);
    }

    #sbm {
        margin-top: 2vh;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }
</style>

<body>
    <form action="" method="POST">
        <!-- Gauge bar above the password input -->    
<!-- Creates a horizontal bar with 4 colored blocks that visually
 show the password strength level (weak to strong). Each div fills in with color as strength increases.  -->
        <div id="gauge-container">
            <div class="gauge-segment" id="seg1"></div>
            <div class="gauge-segment" id="seg2"></div>
            <div class="gauge-segment" id="seg3"></div>
            <div class="gauge-segment" id="seg4"></div>
        </div>

        <input id="ps" type="text" placeholder="Enter password" minlength="8" maxlength="16" required>
        <div class="bar" id="bar">STRENGTH</div>
        <input type="submit" id="sbm">
    </form>
</body>

<script>
    check();
    function check() {
        var ps = document.getElementById('ps').value;
        var lvl = 0;

        if (/[A-Z]/.test(ps)) lvl += 1;
        if (/[a-z]/.test(ps)) lvl += 1;
        if (/[0-9]/.test(ps)) lvl += 1;
        if (/[^A-Z a-z0-9]/.test(ps)) lvl += 1;

        document.getElementById('ps').addEventListener("input", check);

        let bar = document.getElementById('bar');
        if (lvl == 1) {
            bar.style.background = "red";
            bar.style.width = "6vw";
            bar.innerHTML = 'WEAK';
        } else if (lvl == 2) {
            bar.style.background = "orange";
            bar.style.width = "10vw";
            bar.innerHTML = 'MEDIUM';
        } else if (lvl == 3) {
            bar.style.background = "gold";
            bar.style.width = "14vw";
            bar.innerHTML = 'MODERATE';
        } else if (lvl == 4) {
            bar.style.background = "limegreen";
            bar.style.width = "18vw";
            bar.innerHTML = 'STRONG';
        } else {
            bar.style.background = "transparent";
            bar.innerHTML = '';
        }

        // Gauge segments
        const colors = ["red", "orange", "yellow", "green"];
        for (let i = 1; i <= 4; i++) {
            const seg = document.getElementById("seg" + i);
            if (i <= lvl) {
                seg.style.backgroundColor = colors[i - 1];
            } else {
                seg.style.backgroundColor = "gray";
            }
        }

    
		// Toggle button

		if (lvl < 4) {
            document.getElementById('sbm').disabled = true;
            document.getElementById('sbm').style.cssText = "opacity:0.4";
        }
        else {
            document.getElementById('sbm').disabled = false;
            document.getElementById('sbm').style.cssText = "opacity:1";
        }
    }
        
</script>

</html>
