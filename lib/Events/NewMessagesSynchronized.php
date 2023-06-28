<?php

declare(strict_types=1);

/**
 * @copyright 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Mail\Events;

use OCA\Mail\Account;
use OCA\Mail\Db\Mailbox;
use OCA\Mail\Db\Message;
use OCP\EventDispatcher\Event;

class NewMessagesSynchronized extends Event {
	/** @var Account */
	private $account;

	/** @var Mailbox */
	private $mailbox;

	/** @var array|Message[] */
	private $messages;

	/**
	 * @param Account $account
	 * @param Mailbox $mailbox
	 * @param Message[] $messages
	 */
	public function __construct(Account $account,
		Mailbox $mailbox,
		array $messages) {
		parent::__construct();
		$this->account = $account;
		$this->mailbox = $mailbox;
		$this->messages = $messages;
	}

	public function getAccount(): Account {
		return $this->account;
	}

	public function getMailbox(): Mailbox {
		return $this->mailbox;
	}

	/**
	 * @return Message[]
	 */
	public function getMessages() {
		return $this->messages;
	}
}
