<div class="comment">
<div class="comments-container" id="comments-container">
    <!-- Comments will be dynamically inserted here -->
</div>
<form action="" method="post">
    <textarea autofocus name="comment" id="comment-input" placeholder="write a reply..."></textarea>
    <input type="submit" name="reply" value="Post Reply">
</form>
</div>
<style>
.comment {
    border: 1px solid #B0C7D6;
    border-radius: 3px;
    background: #EFF7FE;
    padding: 10px;
    margin-bottom: 15px;
    font-size: 14px;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
    font-weight: bold;
}

.comment-author {
    color: #1e8ffe;
}

.comment-date {
    color: #888;
}

.comment-content p {
    margin: 0;
    line-height: 1.5;
}

</style>