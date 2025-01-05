document.addEventListener('DOMContentLoaded', function() {
    var rows = document.querySelectorAll('#students tr');
    rows.forEach(function(row) {
        row.addEventListener('click', function() {
            this.style.transform = 'scale(1.05)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var viewButtons = document.querySelectorAll('.button1');
    viewButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var modal = document.getElementById('myModal');
            
            modal.classList.remove('closing'); 
        });
    });

    var closeButton = document.querySelector('.close');
    closeButton.addEventListener('click', function() {
        var modal = document.getElementById('myModal');
        modal.classList.add('closing'); 
        setTimeout(function() {
            
        }, 500); 
    });
});
