<?php

namespace SV\UserMentionsImprovements\XF\Pub\Controller;

class Account extends XFCP_Account
{
	protected function preferencesSaveProcess(\XF\Entity\User $visitor)
	{
		$form = parent::preferencesSaveProcess($visitor);

		$input = $this->filter([
			'option' => [
				'sv_email_on_mention' => 'bool',
				'sv_email_on_quote' => 'bool'
			]
		]);

		$userOptions = $visitor->getRelationOrDefault('Option');
		$form->setupEntityInput($userOptions, $input);

		return $form;
	}
}