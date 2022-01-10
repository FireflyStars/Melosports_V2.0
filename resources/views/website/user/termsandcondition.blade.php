@include('website.user.header')
@include('website.user.menu1')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
<div class="show_contest">
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>
			
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Terms And Condition
				</div>
				
				
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="about_con">
			
				<ul>
				{{-- <li>
						<div class="row">
							<div class="term_no">1.</div>
							<div class="term_con">Leaguerocks.com is the website designed and owned by Blaze Enterprises (The Company).
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">2.</div>
							<div class="term_con">
							If you enter into any fantasy cricket game through the web site located at http://www.leaguerocks.com ('the Site') you agree to these Terms of Use. If you do not agree with any of these Terms of Use please do not use the Site, because by using the Site you will be deemed to have irrevocably agreed to these Terms of Use.
							</div>
						</div>
					</li>
					
					<li>
						<div class="row">
							<div class="term_no">3.</div>
							<div class="term_con">
							The games listed in Leaguerocks.com are open to the residents of India. But Residents of the states of Assam, Odisha and Telangana, and where otherwise prohibited by law are not eligible to enter games with cash winning. The residents of Assam, Odhisha and Telengana can still play the practice leagues which do involve actual money or credit points involved.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">4.</div>
							<div class="term_con">
							The Site does not use the personal information of any user. It is saved only for verification purpose. Any other user of Leaguerocks.com or any other person is not allowed to access information of other users.
							</div>
						</div>					
					</li>
					<li>
						<div class="row">
							<div class="term_no">5.</div>
							<div class="term_con">
							The users should enter valid information. Entering invalid information will freeze forfeit and freeze the user accounts.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">6.</div>
							<div class="term_con">
							Leaguerocks.com or Blaze Enterprises do not influence any games or does not give any pre insights of the actual matches played to anyone. Selection of players is purely based on the decision and skill of the users and has no influence from Leaguerocks.com or Blaze Enterprises.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">7.</div>
							<div class="term_con">
							Leaguerocks.com, Blaze Enterprises or any of its employees and affiliates do not knowingly have access to any insider information other than the information available to general public, on the matches published every day in the Site. The users of the Site should not access to any illegal information to gain advantage over other users.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">8.</div>
							<div class="term_con">
							<u>Liability and Obligation</u>
							</div>
						</div>
						<ul>
							<li>
								<div class="row">
									<div class="term_no">a)</div>
									<div class="term_con">
									The Site agrees to use its reasonable endeavors to maintain the Site in a fully operating condition and error free. As the Company cannot guarantee that the Site will always be fully operational or error free it does not accept responsibility for any defects that may exist or for any costs or losses arising from your use of or inability to access the Site.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">b)</div>
									<div class="term_con">
									Whilst the Company takes reasonable precautions to ensure that any downloads it makes available will be virus free the Company does not warrant that any downloads will be virus.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">c)</div>
									<div class="term_con">
									The Company excludes, to the fullest extent permitted by applicable laws, and save in respect of death or personal injury arising from our negligence, all liability for any claims, losses, demands and damages arising directly or indirectly out of or in any way connected with the use of the Site or their unavailability. This exclusion shall apply in respect of, without limitation, any interruption of services, lost profits, loss of contracts or business opportunity, loss of data, or any other consequential, incidental, special, or punitive damages arising out of the site, even if the Company has been advised of the possibility of such damages, whether arising in contract, tort, under statute or otherwise.
									</div>
								</div>
							</li>					
						</ul>
					</li>
					<li>
						<div class="row">
							<div class="term_no">9.</div>
							<div class="term_con">
							<u>Playing the game</u>
							</div>
						</div>
						<ul>
							<li>
								<div class="row">
									<div class="term_no">a)</div>
									<div class="term_con">
									Follow the rules and instructions in the HOW TO PLAY pages.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">b)</div>
									<div class="term_con">
									You may only register one team per entrant. Anybody believed to have registerd more than one team will be disqualified and will not be eligible to win prizes.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">c)</div>
									<div class="term_con">
									Teams will not be considered until they have been submitted online and a confirmation of such submission has been received by the user online.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">d)</div>
									<div class="term_con">
									For the purposes of the Game and your use of the Site our computer record of your entry will be considered to be your entry. We have the right to reject what, in our sole discretion, we consider to be incomplete, inaccurate or corrupted entries. The decision of the Company as to whether an entry is incomplete, inaccurate or corrupted is final.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">e)</div>
									<div class="term_con">
									The Company is committed to ensuring, as far as reasonably practicable to do so, that its Site and the Game do not cause offence to anyone using the same. We therefore request that you do not enter a name for your team that may be considered by others to be inappropriate or offensive. A non-exhaustive list of names that may be consider to be inappropriate or offensive are names that are obscene, pornographic, racist, abusive or harassing. We reserve the right to refuse to accept, and may change any team names which we feel, in our sole discretion, are inappropriate or offensive.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">f)</div>
									<div class="term_con">
									The players included on the player list and their positional classifications have been determined by the Company. The Company will not enter into any correspondence relating to details of the player list, nor will they accept the inclusion into a team.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">g)</div>
									<div class="term_con">
									The company will use the latest scores reported by key news agencies to use as the basis of the fantasy scoring criteria. Scores will only be corrected if the initial reporting was incorrect.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">h)</div>
									<div class="term_con">
									The Company respects the intellectual property rights of others and asks users of the Site to do the same. The Site and all materials, characters, logos or other images, and in particular the rules, scoring and ranking structure incorporated by the Company, on the Site are protected by copyrights or other intellectual property rights. No information may be reproduced in any format without prior written consent from the Company.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">i)</div>
									<div class="term_con">
									Please act responsibly when using the site and comply with these Terms of Use and the Rules Of Fantasy Cricket Matches. It is a condition of entry that all rules and Terms of Use are accepted as final. The Company reserves the right to refuse to accept or disqualify any entry which, in its sole opinion, does not comply with the rules and regulations of the Game or which contravenes the essence of the Game.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">j)</div>
									<div class="term_con">
									Informative and explanatory information supplied by the Company relating to the Game forms part of the Terms of Use of the Game.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">k)</div>
									<div class="term_con">
									The Game is not open to employees of the Promoter, the Company or associated companies, their relatives, agents or agents' relatives
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">l)</div>
									<div class="term_con">
									Distribution of Prizes and their value will be governed by the "How to Play" pages
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">m)</div>
									<div class="term_con">
									Additional proof of identity may also be required at the company's discression
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">n)</div>
									<div class="term_con">
									Please note you are responsible for any taxes due on your winnings
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">o)</div>
									<div class="term_con">
									If proof of age is requested, the prize shall not be dispatched unless proof of age is received and if satisfactory proof of age is not received, the Promoter reserves the rights to choose another winner.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">p)</div>
									<div class="term_con">
									The receipt, by you if you are a winner, of any prize is conditional upon compliance with any and all laws, rules and regulations including, without limitation, these Terms of Use.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">q)</div>
									<div class="term_con">
									Winners agree that neither the Company or Promoters nor their employees shall have any liability in connection with the acceptance or use of any of the prizes. Non-fulfillment of the prizes must be taken up with the company.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">r)</div>
									<div class="term_con">
									If due to circumstances beyond the control of the Company, the Company is unable to provide the stated prizes, the Company reserves the rights to award substitute prizes of equal or greater value. All prizes are subject to the terms and conditions of the supplier.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">s)</div>
									<div class="term_con">
									All winners by accepting the prize will agree to taking part in any publicity to do with the winning of the game without further consent or payment. Such publicity may include their names and likeness.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">t)</div>
									<div class="term_con">
									By registering to play the game you are accepting to receive email updates from the company.The email address held by the Company should be kept valid at all times. Any changes to email addresses must be made in a timely manner via email from the email address currently registerd with the company.
									</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="term_no">u)</div>
									<div class="term_con">
									The Company reserves the right to validate email addresses at any time and the right to remove or suspend from the game, any teams found to have an invalid email address resulting in the forfeiting of any prize.
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li>
						<div class="row">
							<div class="term_no">10.</div>
							<div class="term_con">
							<u>System Abuse</u><br>
							If we find, or suspect, that you have engaged in or attempted to engage in 'spamming' (the unsolicited emailing for business or other purposes), sent or attempted to send, created or attempted to create, or replied or attempted to reply to so-called 'mailbombs' (the sending of multiple or large electronic files or messages with malicious intent or the e-mailing of copies of a single message to many users), or hacked or attempted to hack into any systems or servers run by the Company or undertaken any other activity which may adversely effect either the operation of the site or another person's enjoyment of the Site, we will immediately remove you from the system and your subscription will be canceled. You will have no right to any refund in these circumstances and the Company reserves the right to report the matter to the relevant authorities.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">11.</div>
							<div class="term_con">
							<u>Jurisdiction</u><br>
							These Terms of Use shall be governed by and construed in accordance with the laws of Chennai, India. In the event of a dispute, the decision of the company shall be final
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">12.</div>
							<div class="term_con">
							<u>Refunds </u><br>
							Any Entry fees will be refunded for any match that is abandoned according to the rules of Fantasy Cricket Matches as outlined in the how to play pages.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">13.</div>
							<div class="term_con">
							<u>Termination Of Membership</u> <br>
							The company reserves the right to suspend or discontinue any users account at its sole discretion resulting in the forfeiting of any prizes won
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">14.</div>
							<div class="term_con">
							<u>Termination Of Service </u><br>
							The Operator may change, suspend or discontinue any aspect of the Site at any time, including the availability of any Site feature, database, or content. The Operator may also impose limits on certain features and services or restrict your access to parts or the entire Site without notice or liability at any time in the Operator's exclusive discretion, without prejudice to any legal or equitable remedies available to the Operator, for any reason or purpose, including, but not limited to, conduct that the Operator believes violates these Terms of Use or other policies or guidelines posted on the Site or conduct which the Operator believes is harmful to other customers, to the Operator's business, or to other information providers. Upon any termination of this agreement, you will immediately discontinue your use and access of the Site and destroy all materials obtained from it.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">15.</div>
							<div class="term_con">
							The Company cannot accept any liability if matches the game is based on are canceled or postponed due to reasons outside our control.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">16.</div>
							<div class="term_con">
							If any provision of these Terms of Use shall be unlawful, void, or for any reason unenforceable, then that provision shall be deemed severable for this agreement and shall not affect the validity and enforceability of any remaining provisions. This is the entire agreement between the parties relating to the matters contained herein.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">17.</div>
							<div class="term_con">
							The use of the term Cricket World Cup, Champions Trophy, Champions League, IPL , Indian Premier League or any reference to official international or domestic players on the Site and within the Game is purely to describe the nature of the content and Game being provided in this site. No official or commercial association with the ICC or the world cup organizing committee or any cricketing boards is implied or intended.
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">18.</div>
							<div class="term_con">
							TDS deduction of 30.9% for winnings of 10000 and above.
							</div>
						</div>
				</li> --}}
				
				
				
				@php($site=App\SiteSetting::findorfail(1))
				{!! $site->terms_condition!!}
				</ul>
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

