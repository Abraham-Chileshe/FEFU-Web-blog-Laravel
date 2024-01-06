<script>
$(window).on('load',function(){
  $('#AgreementModal').modal({
    show: true,
    backdrop: 'static',
    keyboard: false
  });
  $("#agreecheck").click(function() {
    $("#continue-cp").attr("disabled", !this.checked);
  });
});
</script>

<div id="AgreementModal" class="modal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title"><i class="icon-boat"></i> User Content Agreement</h2>
        </div>
        <div class="modal-body">
           <form action="{{ url('agreement')}}" method="post" class="form">
            {{ csrf_field() }}

            <div style="  overflow-y: scroll; max-height:300px">
                By posting content on this blog site, you agree to adhere to the following terms and conditions. Any violation of these terms may result in the removal of your content and, in severe cases, the termination of your account.
            
                <h5 class="mt-3">1. No Abusive Content:</h5>
                <p>Users are strictly prohibited from posting content that includes, but is not limited to, abusive language, hate speech, threats, harassment, or any form of content that promotes violence or harm towards individuals or groups.</p>
                
                <h5 class="mt-3">2. No Sexual Content:</h5>
                <p>Users must refrain from posting explicit or sexually explicit content, including but not limited to pornography, sexually suggestive material, or content that violates generally accepted norms of decency.</p>
                
                <h5 class="mt-3">3. Respect for Others:</h5>
                <p>Respect the opinions and perspectives of others. Do not engage in personal attacks, trolling, or any behavior that disrupts the respectful and constructive nature of the community.</p>
            
                <h5 class="mt-3">4. Moderation and Enforcement:</h5>
                <p>The administrators of this blog site reserve the right to moderate and enforce these terms. Content that violates these terms may be removed without notice. Repeated violations may result in the suspension or termination of user accounts.</p>
            </div>
        
            <p>
              <div class="checkbox">
                <label><input id="agreecheck" name="agreecheck" type="checkbox" value="accept"><strong> I agree to Piracy policy</strong></label>
              </div>
            </p>
            <p>
            <div class="text-right">
              
              <input type="Submit" id="continue-cp" value="Continue" class="btn btn-success push-right" disabled>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>