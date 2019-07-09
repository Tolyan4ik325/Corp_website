@foreach($items as $item)
<li id="li-comment-{{$item->id}}" class="comment even {{ ($item->user_id == $article->user_id) ? 'bypostauthor odd' :: ''}}">
	<div class="comment-container">
	    <div class="comment-author vcard">
	        <img alt="" src="images/avatar/unknow.png" class="avatar" height="75" width="75" />
	        <cite class="fn">Anonymous</cite>                 
	    </div>
	    <!-- .comment-author .vcard -->
	    <div class="comment-meta commentmetadata">
	        <div class="intro">
	            <div class="commentDate">
	                <a href="#comment-2">
	                September 24, 2012 at 1:31 pm</a>                        
	            </div>
	            <div class="commentNumber">#&nbsp;1</div>
	        </div>
	        <div class="comment-body">
	            <p>Hi all, i’m a guest and this is the guest’s awesome comments template!</p>
	        </div>
	        <div class="reply group">
	            <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-2&quot;, &quot;2&quot;, &quot;respond&quot;, &quot;41&quot;)">Reply</a>                    
	        </div>
	        <!-- .reply -->
	    </div>
	    <!-- .comment-meta .commentmetadata -->
	</div>
	<!-- #comment-##  -->
</li>

@endforeach