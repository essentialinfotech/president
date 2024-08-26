<style>
    .chat-btn {
        position: fixed;
        right: 14px;
        bottom: 0px;
        z-index: 9999;
        cursor: pointer;
    }

    .chat-btn .close {
        display: none
    }

    .chat-btn i {
        transition: all 0.9s ease
    }

    #check:checked~.chat-btn i {
        display: block;
        pointer-events: auto;
        transform: rotate(180deg)
    }

    #check:checked~.chat-btn .comment {
        display: none
    }

    .chat-btn i {
        font-size: 22px;
        color: #fff !important
    }

    .chat-btn {
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        background-color: #43cf52;
        color: #fff;
        font-size: 22px;
        border: none
    }

    .chat-container {
        position: fixed;
        right: 20px;
        bottom: 70px;
        max-width: 480px;
        background-color: #f4f4f4;
        border-radius: 5px;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
        transition: all 0.4s
    }

    #check:checked~.chat-container {
        opacity: 1;
        visibility: visible;
    }



    .chat-input {
        padding: 15px
    }

    .chat-input input,
    button {
        margin-bottom: 10px
    }



    .form-control:focus,
    .btn:focus {
        box-shadow: none
    }

    .chat-input .btn,
    .chat-input .btn:focus,
    .chat-input .btn:hover {
        background-color: #43cf52;
        border: #43cf52
    }

    #check {
        display: none !important
    }

    /*  */
    .chat-header {
        /* background-color: #43cf52;
        color: #fff; */
        padding: 15px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .chat-messages {
        height: 300px;
        padding: 15px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .message {
        margin-bottom: 10px;
        display: flex;
        align-items: flex-start;
        flex-direction: column;
    }

    .message.bot .content {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 10px;
        width: 90%;
    }

    .message.user .content {
        background-color: #0f100f;
        color: #fff;
        border-radius: 5px;
        padding: 10px;
        margin-left: auto;
        width: 90%;
    }

    .chat-input {
        padding: 15px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    /* @media only screen and (max-width: 600px) {
        .chat-container {
            width: 100%;
        }
    } */
</style>
<style>
    /* Include your existing styles here */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<input type="checkbox" id="check"> <label class="chat-btn" for="check"> <i class="fa fa-whatsapp comment"></i> <i
        class="fa fa-close close"></i> </label>

<div class="chat-container">
    <div class="chat-header">
        <h5 class="mb-0">WhatsApp Chat</h5>
    </div>
    <div class="chat-messages" id="chatMessages">
        <!-- Chat messages will go here -->
        <div class="message bot">
            <div class="content">What can we do for you today?</div>
            <p><?php echo e(date('M d, Y, h:i A')); ?></p>
        </div>
    </div>
    <div class="chat-input">
        <div class="input-group">
            <input type="text" class="form-control" id="messageInput" placeholder="Type your message...">
            <div class="input-group-append">
                <button class="btn btn-primary" id="sendMessageButton">
                    <svg data-v-cfdaf78a="" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="icon t-icon"
                        width="24px" height="24px" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m20.34 9.32l-14-7a3 3 0 0 0-4.08 3.9l2.4 5.37a1.06 1.06 0 0 1 0 .82l-2.4 5.37A3 3 0 0 0 5 22a3.14 3.14 0 0 0 1.35-.32l14-7a3 3 0 0 0 0-5.36Zm-.89 3.57l-14 7a1 1 0 0 1-1.35-1.3l2.39-5.37a2 2 0 0 0 .08-.22h6.89a1 1 0 0 0 0-2H6.57a2 2 0 0 0-.08-.22L4.1 5.41a1 1 0 0 1 1.35-1.3l14 7a1 1 0 0 1 0 1.78">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('sendMessageButton').addEventListener('click', function() {
        var message = document.getElementById('messageInput').value;
        if (message.trim() !== '') {
            var phoneNumber = '+8801857670998'; // Replace with your WhatsApp number (with country code)
            var whatsappUrl = 'https://api.whatsapp.com/send?phone=' + phoneNumber + '&text=' +
                encodeURIComponent(message);
            window.open(whatsappUrl, '_blank');
        }
    });
</script>
<?php /**PATH E:\EIT2024\BagsLaravelWebsites\PresidentWebsite - size variant\resources\views/frontend/body/chat.blade.php ENDPATH**/ ?>