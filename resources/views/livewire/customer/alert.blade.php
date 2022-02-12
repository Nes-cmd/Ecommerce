<div>
    <div id="snackbar">
        <div id="alerticon" class="flex items-center text-xl">
        </div>
    </div>
    
    <script>
        window.onload = function(){
            Livewire.on('listenAlert', message => {
            var icon = document.getElementById('alerticon');
            var x = document.getElementById("snackbar");
            // var bg =  message.bg;
            var color = "green";
            if(message.bg !== undefined){
                color = message.bg;
            }
            if(message.type == 'success'){
                x.style.backgroundColor = color;
                icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /><p id="messageplace" class="pl-3"></p></svg>';
            }
            else if(message.type == 'info'){
                x.style.backgroundColor = color;
                icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /><p id="messageplace" class="pl-3"></p></svg>';
            }
            var data = document.getElementById("messageplace");
            data.innerHTML = message.message;
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
        });
        }
    </script>
    
</div>
