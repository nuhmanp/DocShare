
	<div class="container-fluid">     
		<div class="row">
			<div class="menu">
				<? if($this->request->session()->read('Auth.User.id') > 0){ ?>
						<div class="customLink col-sm-1">
							<?= $this->Html->link('Add Article', ['controller' => 'Articles', 'action' => 'add']) ?>

						</div>
						<div class="dashboard col-sm-1">
							<?= $this->Html->link('Dashboard', ['controller' => 'users', 'action' => 'dashboard']) ?>

						</div>
						<div class="articles col-sm-1">
							<?= $this->Html->link('Posts', ['controller' => 'users','action' => 'posts']) ?>
						</div>
						<?php 
							if($this->request->session()->read('Auth.User.role') == 'admin'){ 
						?>
								<div class="users col-sm-1">
									<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'all']) ?>
								</div>
								<div class="comments col-sm-1">
									<?= $this->Html->link('Comments', ['controller' => 'Comments', 'action' => 'index']) ?>
								</div>
								<div class="tags col-sm-1">
									<?= $this->Html->link('Tags', ['controller' => 'Tags','action' => 'index']) ?>
								</div>	
						<?php } ?>
						<div class="logout col-sm-1">
							<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
						</div>
				<?	}else{ ?>
						<div class="login col-sm-1">
						<?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?>
						</div>
				<?	} ?>
			</div>
		</div>
		<?php foreach($articles as $article): ?>
		<div class="row">
			<div class="articleCotainer">
				<div class="article w3-card-4 w3-yellow">
					<div class="articleTitle"> 
						<?= $article['title'] ?>
					</div>
					<h5>Content</h5>
					<div class="articleContent">
						<?= $article['content'] ?>
					</div>
					<div class="authorDate">
					<h6>Date: <?= $article['date'] ?></h6>
					</div>
					<?php if($article['commentsAllowed']){ ?>
						<div class="row" >
						<h1>Add Comment</h1>
							<?php
								echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments', 'action'=>'add')));
								echo $this->Form->input('Name', array('name' => 'authorName'));
								echo $this->Form->hidden('article_id', array('value' => $article['id']));
								echo $this->Form->hidden('date', array('value' => $article['id']));
								echo $this->Form->input('E-Mail', array('name' => 'authorEmail'));
								echo $this->Form->input('content', ['rows' => '5']);
								echo $this->Form->button(__('Send'));
								echo $this->Form->end();
							?>
						</div>
						<?php } ?>
					<div class="comments">
						<h5>Comments</h5>
						<div class="comment">
							<? foreach($article['comments'] as $comment){ ?>
							<?= "<p>".$comment['authorName']."->".$comment['content']."</p>" ?>
							<? } ?> 
						</div>
					</div>
					
				</div>
			</div>
		</div>
	<?php endforeach; ?>   
		
		
		
</div>