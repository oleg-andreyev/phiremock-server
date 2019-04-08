<?php
/**
 * This file is part of Phiremock.
 *
 * Phiremock is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Phiremock is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Phiremock.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Mcustiel\Phiremock\Server\Actions;

use Mcustiel\Phiremock\Server\Model\ScenarioStorage;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClearScenariosAction implements ActionInterface
{
    /**
     * @var ScenarioStorage
     */
    private $storage;

    /**
     * @param ScenarioStorage $storage
     */
    public function __construct(ScenarioStorage $storage)
    {
        $this->storage = $storage;
    }

    public function execute(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->storage->clearScenarios();

        return $response->withStatus(200);
    }
}
